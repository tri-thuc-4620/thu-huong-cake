<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index');
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store()
    {
        return redirect()->route('admin.roles.index')->with('success', 'Da tao vai tro!');
    }

    public function edit($id)
    {
        return view('admin.roles.edit');
    }

    public function update($id)
    {
        return redirect()->route('admin.roles.index')->with('success', 'Da cap nhat vai tro!');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.roles.index')->with('success', 'Da xoa vai tro!');
    }
}
