<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class StoreLocationController extends Controller
{
    public function index()
    {
        return view('admin.store-locations.index');
    }

    public function create()
    {
        return view('admin.store-locations.create');
    }

    public function store()
    {
        return redirect()->back()->with('success', 'Cửa hàng đã được tạo thành công.');
    }

    public function show($id)
    {
        return view('admin.store-locations.show', compact('id'));
    }

    public function edit($id)
    {
        return view('admin.store-locations.edit', compact('id'));
    }

    public function update($id)
    {
        return redirect()->back()->with('success', 'Cửa hàng đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        return redirect()->back()->with('success', 'Cửa hàng đã được xóa thành công.');
    }
}
