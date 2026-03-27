<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CakeSizeController extends Controller
{
    public function index()
    {
        return view('admin.cake-sizes.index');
    }

    public function create()
    {
        return view('admin.cake-sizes.create');
    }

    public function store()
    {
        return redirect()->back()->with('success', 'Kích thước bánh đã được tạo thành công.');
    }

    public function show($id)
    {
        return view('admin.cake-sizes.show', compact('id'));
    }

    public function edit($id)
    {
        return view('admin.cake-sizes.edit', compact('id'));
    }

    public function update($id)
    {
        return redirect()->back()->with('success', 'Kích thước bánh đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        return redirect()->back()->with('success', 'Kích thước bánh đã được xóa thành công.');
    }
}
