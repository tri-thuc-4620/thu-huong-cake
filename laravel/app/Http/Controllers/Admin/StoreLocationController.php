<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StoreLocation;
use Illuminate\Http\Request;

class StoreLocationController extends Controller
{
    public function index()
    {
        $locations = StoreLocation::orderBy('sort_order')->paginate(15);

        return view('admin.store-locations.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.store-locations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'short_name'      => 'nullable|string|max:100',
            'address'         => 'required|string|max:500',
            'city'            => 'nullable|string|max:100',
            'district'        => 'nullable|string|max:100',
            'phone'           => 'nullable|string|max:20',
            'latitude'        => 'nullable|numeric',
            'longitude'       => 'nullable|numeric',
            'google_maps_url' => 'nullable|url|max:500',
            'is_active'       => 'nullable|boolean',
            'sort_order'      => 'nullable|integer',
        ]);

        StoreLocation::create($validated);

        return redirect()->route('admin.store-locations.index')
            ->with('success', 'Cua hang da duoc tao thanh cong.');
    }

    public function show($id)
    {
        $location = StoreLocation::findOrFail($id);

        return view('admin.store-locations.show', compact('location'));
    }

    public function edit($id)
    {
        $location = StoreLocation::findOrFail($id);

        return view('admin.store-locations.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        $location = StoreLocation::findOrFail($id);

        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'short_name'      => 'nullable|string|max:100',
            'address'         => 'required|string|max:500',
            'city'            => 'nullable|string|max:100',
            'district'        => 'nullable|string|max:100',
            'phone'           => 'nullable|string|max:20',
            'latitude'        => 'nullable|numeric',
            'longitude'       => 'nullable|numeric',
            'google_maps_url' => 'nullable|url|max:500',
            'is_active'       => 'nullable|boolean',
            'sort_order'      => 'nullable|integer',
        ]);

        $location->update($validated);

        return redirect()->route('admin.store-locations.index')
            ->with('success', 'Cua hang da duoc cap nhat thanh cong.');
    }

    public function destroy($id)
    {
        $location = StoreLocation::findOrFail($id);
        $location->delete();

        return redirect()->route('admin.store-locations.index')
            ->with('success', 'Cua hang da duoc xoa thanh cong.');
    }
}
