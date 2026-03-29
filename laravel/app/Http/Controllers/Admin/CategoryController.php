<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

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

    public function store(CategoryRequest $request)
    {
        // Lấy dữ liệu đã được validate và chuẩn hóa từ CategoryRequest
        $data = $request->validated();

        Category::create($data);

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

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        // Lấy dữ liệu đã được validate và chuẩn hóa từ CategoryRequest
        $data = $request->validated();

        $category->update($data);

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
