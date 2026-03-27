<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HeroSlideController extends Controller
{
    public function index()
    {
        return view('admin.hero-slides.index');
    }

    public function create()
    {
        return view('admin.hero-slides.create');
    }

    public function store()
    {
        return redirect()->back()->with('success', 'Slide đã được tạo thành công.');
    }

    public function show($id)
    {
        return view('admin.hero-slides.show', compact('id'));
    }

    public function edit($id)
    {
        return view('admin.hero-slides.edit', compact('id'));
    }

    public function update($id)
    {
        return redirect()->back()->with('success', 'Slide đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        return redirect()->back()->with('success', 'Slide đã được xóa thành công.');
    }
}
