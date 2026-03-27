<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ContactMessageController extends Controller
{
    public function index()
    {
        return view('admin.contact-messages.index');
    }

    public function show($id)
    {
        return view('admin.contact-messages.show', compact('id'));
    }

    public function edit($id)
    {
        return view('admin.contact-messages.edit', compact('id'));
    }

    public function update($id)
    {
        return redirect()->back()->with('success', 'Tin nhắn liên hệ đã được cập nhật thành công.');
    }
}
