<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CallbackRequestController extends Controller
{
    public function index()
    {
        return view('admin.callback-requests.index');
    }

    public function show($id)
    {
        return view('admin.callback-requests.show', compact('id'));
    }

    public function edit($id)
    {
        return view('admin.callback-requests.edit', compact('id'));
    }

    public function update($id)
    {
        return redirect()->back()->with('success', 'Yêu cầu gọi lại đã được cập nhật thành công.');
    }
}
