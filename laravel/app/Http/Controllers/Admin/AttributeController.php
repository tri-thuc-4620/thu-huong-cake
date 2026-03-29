<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AttributeRequest;
use App\Http\Requests\Admin\AttributeValueRequest;
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

    public function store(AttributeRequest $request)
    {
        $data = $request->validated();

        Attribute::create($data);

        return redirect()->route('admin.attributes.index')
            ->with('success', 'Da them thuoc tinh thanh cong!');
    }

    public function edit($id)
    {
        $attribute = Attribute::findOrFail($id);

        return view('admin.attributes.edit', compact('attribute'));
    }

    public function update(AttributeRequest $request, $id)
    {
        $attribute = Attribute::findOrFail($id);

        $data = $request->validated();

        $attribute->update($data);

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

    public function storeValue(AttributeValueRequest $request, $id)
    {
        $attribute = Attribute::findOrFail($id);

        $data = $request->validated();
        $data['attribute_id'] = $attribute->id;

        AttributeValue::create($data);

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
