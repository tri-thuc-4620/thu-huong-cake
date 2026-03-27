<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index');
    }

    public function create()
    {
        return view('admin.orders.create');
    }

    public function store()
    {
        return redirect()->back()->with('success', 'Đơn hàng đã được tạo thành công.');
    }

    public function show($id)
    {
        return view('admin.orders.show', compact('id'));
    }

    public function edit($id)
    {
        return view('admin.orders.edit', compact('id'));
    }

    public function update($id)
    {
        return redirect()->back()->with('success', 'Đơn hàng đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        return redirect()->back()->with('success', 'Đơn hàng đã được xóa thành công.');
    }
}
