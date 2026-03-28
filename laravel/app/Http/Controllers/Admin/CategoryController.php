<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')
            ->withCount('products')
            ->orderBy('sort_order')
            ->paginate(15);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'parent_id'        => 'nullable|exists:categories,id',
            'description'      => 'nullable|string',
            'image'            => 'nullable|string',
            'sort_order'       => 'nullable|integer',
            'is_visible'       => 'nullable|boolean',
            'show_in_menu'     => 'nullable|boolean',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        Category::create($validated);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Danh muc da duoc tao thanh cong.');
    }

    public function show($id)
    {
        $category = Category::with('parent', 'children', 'products')->findOrFail($id);

        return view('admin.categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('id', '!=', $id)->get();

        return view('admin.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'parent_id'        => 'nullable|exists:categories,id',
            'description'      => 'nullable|string',
            'image'            => 'nullable|string',
            'sort_order'       => 'nullable|integer',
            'is_visible'       => 'nullable|boolean',
            'show_in_menu'     => 'nullable|boolean',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $category->update($validated);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Danh muc da duoc cap nhat thanh cong.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->children()->count() > 0) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Khong the xoa danh muc co danh muc con.');
        }

        if ($category->products()->count() > 0) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Khong the xoa danh muc dang co san pham.');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Danh muc da duoc xoa thanh cong.');
    }
}
