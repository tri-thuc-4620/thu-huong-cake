<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store()
    {
        return redirect()->back()->with('success', 'Danh mục đã được tạo thành công.');
    }

    public function show($id)
    {
        return view('admin.categories.show', compact('id'));
    }

    public function edit($id)
    {
        return view('admin.categories.edit', compact('id'));
    }

    public function update($id)
    {
        return redirect()->back()->with('success', 'Danh mục đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        return redirect()->back()->with('success', 'Danh mục đã được xóa thành công.');
    }
}
