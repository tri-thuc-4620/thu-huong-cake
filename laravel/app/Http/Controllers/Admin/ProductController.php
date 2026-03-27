<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store()
    {
        return redirect()->back()->with('success', 'Sản phẩm đã được tạo thành công.');
    }

    public function show($id)
    {
        return view('admin.products.show', compact('id'));
    }

    public function edit($id)
    {
        return view('admin.products.edit', compact('id'));
    }

    public function update($id)
    {
        return redirect()->back()->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        return redirect()->back()->with('success', 'Sản phẩm đã được xóa thành công.');
    }
}
