<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BlogPostController extends Controller
{
    public function index()
    {
        return view('admin.blog-posts.index');
    }

    public function create()
    {
        return view('admin.blog-posts.create');
    }

    public function store()
    {
        return redirect()->back()->with('success', 'Bài viết đã được tạo thành công.');
    }

    public function show($id)
    {
        return view('admin.blog-posts.show', compact('id'));
    }

    public function edit($id)
    {
        return view('admin.blog-posts.edit', compact('id'));
    }

    public function update($id)
    {
        return redirect()->back()->with('success', 'Bài viết đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        return redirect()->back()->with('success', 'Bài viết đã được xóa thành công.');
    }
}
