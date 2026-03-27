<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PriceTableController extends Controller
{
    public function index()
    {
        return view('admin.price-tables.index');
    }

    public function create()
    {
        return view('admin.price-tables.create');
    }

    public function store()
    {
        return redirect()->route('admin.price-tables.index')->with('success', 'Da tao bang gia thanh cong!');
    }

    public function edit($id)
    {
        return view('admin.price-tables.edit');
    }

    public function update($id)
    {
        return redirect()->route('admin.price-tables.index')->with('success', 'Da cap nhat bang gia!');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.price-tables.index')->with('success', 'Da xoa bang gia!');
    }
}
