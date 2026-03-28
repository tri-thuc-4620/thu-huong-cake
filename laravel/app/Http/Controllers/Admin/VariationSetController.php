<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\VariationSet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VariationSetController extends Controller
{
    public function index()
    {
        $variationSets = VariationSet::withCount('values')->get();
        return view('admin.variation-sets.index', compact('variationSets'));
    }

    public function create()
    {
        $attributes = Attribute::with('values')->get();
        return view('admin.variation-sets.create', compact('attributes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'attribute_value_ids' => 'nullable|array',
            'attribute_value_ids.*' => 'exists:attribute_values,id',
        ]);

        $variationSet = VariationSet::create([
            'name' => $request->name,
            'slug' => $request->slug ?? Str::slug($request->name),
            'description' => $request->description,
            'is_active' => $request->boolean('is_active', true),
        ]);

        if ($request->filled('attribute_value_ids')) {
            $variationSet->values()->sync($request->attribute_value_ids);
        }

        return redirect()->route('admin.variation-sets.index')->with('success', 'Da tao bo bien the!');
    }

    public function edit($id)
    {
        $variationSet = VariationSet::with('values')->findOrFail($id);
        $attributes = Attribute::with('values')->get();
        return view('admin.variation-sets.edit', compact('variationSet', 'attributes'));
    }

    public function update(Request $request, $id)
    {
        $variationSet = VariationSet::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'attribute_value_ids' => 'nullable|array',
            'attribute_value_ids.*' => 'exists:attribute_values,id',
        ]);

        $variationSet->update([
            'name' => $request->name,
            'slug' => $request->slug ?? Str::slug($request->name),
            'description' => $request->description,
            'is_active' => $request->boolean('is_active', true),
        ]);

        $variationSet->values()->sync($request->input('attribute_value_ids', []));

        return redirect()->route('admin.variation-sets.index')->with('success', 'Da cap nhat bo bien the!');
    }

    public function destroy($id)
    {
        $variationSet = VariationSet::findOrFail($id);
        $variationSet->values()->detach();
        $variationSet->delete();

        return redirect()->route('admin.variation-sets.index')->with('success', 'Da xoa bo bien the!');
    }
}
