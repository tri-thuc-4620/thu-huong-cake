<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    public function index()
    {
        return view('admin.blog-categories.index');
    }

    public function create()
    {
        return view('admin.blog-categories.create');
    }

    public function store()
    {
        return redirect()->back()->with('success', 'Danh mục blog đã được tạo thành công.');
    }

    public function show($id)
    {
        return view('admin.blog-categories.show', compact('id'));
    }

    public function edit($id)
    {
        return view('admin.blog-categories.edit', compact('id'));
    }

    public function update($id)
    {
        return redirect()->back()->with('success', 'Danh mục blog đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        return redirect()->back()->with('success', 'Danh mục blog đã được xóa thành công.');
    }
}
