<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function index()
    {
        return view('admin.banners.index');
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store()
    {
        return redirect()->back()->with('success', 'Banner đã được tạo thành công.');
    }

    public function show($id)
    {
        return view('admin.banners.show', compact('id'));
    }

    public function edit($id)
    {
        return view('admin.banners.edit', compact('id'));
    }

    public function update($id)
    {
        return redirect()->back()->with('success', 'Banner đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        return redirect()->back()->with('success', 'Banner đã được xóa thành công.');
    }
}
