<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::withCount('values')->orderBy('sort_order')->get();

        return view('admin.attributes.index', compact('attributes'));
    }

    public function create()
    {
        return view('admin.attributes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'display_type'  => 'nullable|string|max:50',
            'sort_order'    => 'nullable|integer',
            'is_filterable' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        Attribute::create($validated);

        return redirect()->route('admin.attributes.index')
            ->with('success', 'Da them thuoc tinh thanh cong!');
    }

    public function edit($id)
    {
        $attribute = Attribute::findOrFail($id);

        return view('admin.attributes.edit', compact('attribute'));
    }

    public function update(Request $request, $id)
    {
        $attribute = Attribute::findOrFail($id);

        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'display_type'  => 'nullable|string|max:50',
            'sort_order'    => 'nullable|integer',
            'is_filterable' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $attribute->update($validated);

        return redirect()->route('admin.attributes.index')
            ->with('success', 'Da cap nhat thuoc tinh!');
    }

    public function destroy($id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->delete();

        return redirect()->route('admin.attributes.index')
            ->with('success', 'Da xoa thuoc tinh!');
    }

    public function values($id)
    {
        $attribute = Attribute::findOrFail($id);
        $values = $attribute->values()->orderBy('sort_order')->get();

        return view('admin.attributes.values', compact('attribute', 'values'));
    }

    public function storeValue(Request $request, $id)
    {
        $attribute = Attribute::findOrFail($id);

        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'display_value' => 'nullable|string|max:255',
            'sort_order'    => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['attribute_id'] = $attribute->id;

        AttributeValue::create($validated);

        return redirect()->route('admin.attributes.values', $id)
            ->with('success', 'Da them gia tri!');
    }

    public function destroyValue($id, $valueId)
    {
        $value = AttributeValue::where('attribute_id', $id)->findOrFail($valueId);
        $value->delete();

        return redirect()->route('admin.attributes.values', $id)
            ->with('success', 'Da xoa gia tri!');
    }
}
