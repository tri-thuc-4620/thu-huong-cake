<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function update()
    {
        return redirect()->back()->with('success', 'Cài đặt đã được cập nhật thành công.');
    }
}
