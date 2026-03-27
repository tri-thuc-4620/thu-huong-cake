<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CakeBaseController extends Controller
{
    public function index()
    {
        return view('admin.cake-bases.index');
    }

    public function create()
    {
        return view('admin.cake-bases.create');
    }

    public function store()
    {
        return redirect()->back()->with('success', 'Đế bánh đã được tạo thành công.');
    }

    public function show($id)
    {
        return view('admin.cake-bases.show', compact('id'));
    }

    public function edit($id)
    {
        return view('admin.cake-bases.edit', compact('id'));
    }

    public function update($id)
    {
        return redirect()->back()->with('success', 'Đế bánh đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        return redirect()->back()->with('success', 'Đế bánh đã được xóa thành công.');
    }
}
