<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AttributeController extends Controller
{
    public function index()
    {
        return view('admin.attributes.index');
    }

    public function create()
    {
        return view('admin.attributes.create');
    }

    public function store()
    {
        return redirect()->route('admin.attributes.index')->with('success', 'Da them thuoc tinh thanh cong!');
    }

    public function edit($id)
    {
        return view('admin.attributes.edit');
    }

    public function update($id)
    {
        return redirect()->route('admin.attributes.index')->with('success', 'Da cap nhat thuoc tinh!');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.attributes.index')->with('success', 'Da xoa thuoc tinh!');
    }

    public function values($id)
    {
        return view('admin.attributes.values');
    }

    public function storeValue($id)
    {
        return redirect()->route('admin.attributes.values', $id)->with('success', 'Da them gia tri!');
    }

    public function destroyValue($id, $valueId)
    {
        return redirect()->route('admin.attributes.values', $id)->with('success', 'Da xoa gia tri!');
    }
}
