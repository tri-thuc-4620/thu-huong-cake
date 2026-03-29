<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->withCount('permissions')->get();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('admin.roles.create', compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        $validated = $request->validated();

        $role = Role::create(['name' => $validated['name']]);

        if (!empty($validated['permissions'])) {
            $role->syncPermissions($validated['permissions']);
        }

        return redirect()->route('admin.roles.index')
            ->with('success', 'Da tao vai tro thanh cong!');
    }

    public function edit($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(RoleRequest $request, $id)
    {
        $role = Role::findOrFail($id);

        $validated = $request->validated();

        $role->update(['name' => $validated['name']]);
        $role->syncPermissions($validated['permissions'] ?? []);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Da cap nhat vai tro!');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        if ($role->name === 'super-admin') {
            return redirect()->route('admin.roles.index')
                ->with('error', 'Khong the xoa vai tro super-admin.');
        }

        $role->delete();

        return redirect()->route('admin.roles.index')
            ->with('success', 'Da xoa vai tro!');
    }
}
