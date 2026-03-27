<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store()
    {
        return redirect()->back()->with('success', 'Trang đã được tạo thành công.');
    }

    public function show($id)
    {
        return view('admin.pages.show', compact('id'));
    }

    public function edit($id)
    {
        return view('admin.pages.edit', compact('id'));
    }

    public function update($id)
    {
        return redirect()->back()->with('success', 'Trang đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        return redirect()->back()->with('success', 'Trang đã được xóa thành công.');
    }
}
