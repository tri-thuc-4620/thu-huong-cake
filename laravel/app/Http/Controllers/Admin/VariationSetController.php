<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class VariationSetController extends Controller
{
    public function index()
    {
        return view('admin.variation-sets.index');
    }

    public function create()
    {
        return view('admin.variation-sets.create');
    }

    public function store()
    {
        return redirect()->route('admin.variation-sets.index')->with('success', 'Da tao bo bien the!');
    }

    public function edit($id)
    {
        return view('admin.variation-sets.edit');
    }

    public function update($id)
    {
        return redirect()->route('admin.variation-sets.index')->with('success', 'Da cap nhat bo bien the!');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.variation-sets.index')->with('success', 'Da xoa bo bien the!');
    }
}
