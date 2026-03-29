<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->paginate(15);

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(PageRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['title']);

        Page::create($data);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Trang da duoc tao thanh cong.');
    }

    public function show($id)
    {
        $page = Page::findOrFail($id);

        return view('admin.pages.show', compact('page'));
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);

        return view('admin.pages.edit', compact('page'));
    }

    public function update(PageRequest $request, $id)
    {
        $page = Page::findOrFail($id);

        $data = $request->validated();

        $data['slug'] = Str::slug($data['title']);

        $page->update($data);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Trang da duoc cap nhat thanh cong.');
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->route('admin.pages.index')
            ->with('success', 'Trang da duoc xoa thanh cong.');
    }
}
