<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\VariationSet;
use App\Models\ProductImage;
use App\Models\ProductVariation;
use App\Models\ProductTag;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category', 'primaryImage');

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        if ($request->filled('stock_status')) {
            $query->where('stock_status', $request->stock_status);
        }
        if ($request->filled('is_hot')) {
            $query->where('is_hot', $request->is_hot === 'yes');
        }
        if ($request->filled('is_visible')) {
            $query->where('is_visible', $request->is_visible === 'yes');
        }
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->paginate(15);
        $categories = Category::orderBy('name')->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $variationSets = VariationSet::where('is_active', true)->get();
        return view('admin.products.create', compact('categories', 'variationSets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            $data = $request->except(['images', 'tags', 'variation_type', 'cake_base', 'cake_size']);
            $data['slug'] = $data['slug'] ?? Str::slug($request->name);

            $product = Product::create($data);

            // Handle images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $i => $file) {
                    $path = $file->store('products', 'public');
                    $product->images()->create([
                        'image' => $path,
                        'is_primary' => $i === 0,
                        'sort_order' => $i,
                    ]);
                }
            }

            // Handle featured image
            if ($request->hasFile('featured_image')) {
                $path = $request->file('featured_image')->store('products', 'public');
                $product->images()->create([
                    'image' => $path,
                    'is_primary' => true,
                    'sort_order' => 0,
                ]);
            }

            // Handle tags
            if ($request->filled('tags')) {
                $tagNames = array_map('trim', explode(',', $request->tags));
                $tagIds = [];
                foreach ($tagNames as $name) {
                    if (empty($name)) continue;
                    $tag = ProductTag::firstOrCreate(
                        ['slug' => Str::slug($name)],
                        ['name' => $name]
                    );
                    $tagIds[] = $tag->id;
                }
                $product->tags()->sync($tagIds);
            }

            // Handle variations from variation set checkboxes
            if ($request->filled('variation_type') || $request->filled('cake_base') || $request->filled('cake_size')) {
                $this->createVariationsFromCheckboxes($product, $request);
            }

            DB::commit();
            return redirect()->route('admin.products.index')->with('success', 'Da tao san pham thanh cong!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Loi: ' . $e->getMessage())->withInput();
        }
    }

    public function show($id)
    {
        $product = Product::with('category', 'images', 'variations.attributeValues.attribute', 'tags')->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::with('images', 'variations.attributeValues', 'tags')->findOrFail($id);
        $categories = Category::orderBy('name')->get();
        $variationSets = VariationSet::where('is_active', true)->get();
        return view('admin.products.edit', compact('product', 'categories', 'variationSets'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            $data = $request->except(['images', 'tags', 'featured_image', '_token', '_method']);
            $data['slug'] = $data['slug'] ?? Str::slug($request->name);

            $product->update($data);

            // Handle new images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $path = $file->store('products', 'public');
                    $product->images()->create([
                        'image' => $path,
                        'sort_order' => $product->images()->count(),
                    ]);
                }
            }

            // Handle tags
            if ($request->has('tags')) {
                $tagNames = array_map('trim', explode(',', $request->tags ?? ''));
                $tagIds = [];
                foreach ($tagNames as $name) {
                    if (empty($name)) continue;
                    $tag = ProductTag::firstOrCreate(
                        ['slug' => Str::slug($name)],
                        ['name' => $name]
                    );
                    $tagIds[] = $tag->id;
                }
                $product->tags()->sync($tagIds);
            }

            DB::commit();
            return redirect()->route('admin.products.index')->with('success', 'Da cap nhat san pham!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Loi: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete images from storage
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->image);
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Da xoa san pham!');
    }

    private function createVariationsFromCheckboxes(Product $product, Request $request)
    {
        // Get selected attribute values by type
        $bases = $request->input('cake_base', []);
        $sizes = $request->input('cake_size', []);

        if (empty($bases) && empty($sizes)) return;

        $baseValues = !empty($bases) ? AttributeValue::whereIn('slug', $bases)->get() : collect([null]);
        $sizeValues = !empty($sizes) ? AttributeValue::whereIn('slug', $sizes)->get() : collect([null]);

        $product->update(['type' => 'variable']);

        foreach ($baseValues as $base) {
            foreach ($sizeValues as $size) {
                $variation = $product->variations()->create([
                    'price' => $product->price,
                    'stock_status' => 'in_stock',
                    'is_active' => true,
                ]);

                $valueIds = [];
                if ($base) $valueIds[] = $base->id;
                if ($size) $valueIds[] = $size->id;

                if (!empty($valueIds)) {
                    $variation->attributeValues()->sync($valueIds);
                }
            }
        }
    }
}
