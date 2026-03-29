<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VariationSetRequest;
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

    public function store(VariationSetRequest $request)
    {
        $data = $request->validated();

        $variationSet = VariationSet::create([
            'name' => $data['name'],
            'slug' => $data['slug'] ?? Str::slug($data['name']),
            'description' => $data['description'] ?? null,
            'is_active' => $data['is_active'] ?? true,
        ]);

        if (!empty($data['attribute_value_ids'])) {
            $variationSet->values()->sync($data['attribute_value_ids']);
        }

        return redirect()->route('admin.variation-sets.index')->with('success', 'Da tao bo bien the!');
    }

    public function edit($id)
    {
        $variationSet = VariationSet::with('values')->findOrFail($id);
        $attributes = Attribute::with('values')->get();
        return view('admin.variation-sets.edit', compact('variationSet', 'attributes'));
    }

    public function update(VariationSetRequest $request, $id)
    {
        $variationSet = VariationSet::findOrFail($id);

        $data = $request->validated();

        $variationSet->update([
            'name' => $data['name'],
            'slug' => $data['slug'] ?? Str::slug($data['name']),
            'description' => $data['description'] ?? null,
            'is_active' => $data['is_active'] ?? true,
        ]);

        $variationSet->values()->sync($data['attribute_value_ids'] ?? []);

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
