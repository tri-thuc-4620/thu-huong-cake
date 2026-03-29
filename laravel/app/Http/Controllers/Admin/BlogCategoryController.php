<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogCategoryRequest;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::withCount('posts')
            ->orderBy('sort_order')
            ->paginate(15);

        return view('admin.blog-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blog-categories.create');
    }

    public function store(BlogCategoryRequest $request)
    {
        $data = $request->validated();

        BlogCategory::create($data);

        return redirect()->route('admin.blog-categories.index')
            ->with('success', 'Danh muc blog da duoc tao thanh cong.');
    }

    public function show($id)
    {
        $category = BlogCategory::withCount('posts')->findOrFail($id);

        return view('admin.blog-categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = BlogCategory::findOrFail($id);

        return view('admin.blog-categories.edit', compact('category'));
    }

    public function update(BlogCategoryRequest $request, $id)
    {
        $category = BlogCategory::findOrFail($id);

        $data = $request->validated();

        $category->update($data);

        return redirect()->route('admin.blog-categories.index')
            ->with('success', 'Danh muc blog da duoc cap nhat thanh cong.');
    }

    public function destroy($id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.blog-categories.index')
            ->with('success', 'Danh muc blog da duoc xoa thanh cong.');
    }
}
