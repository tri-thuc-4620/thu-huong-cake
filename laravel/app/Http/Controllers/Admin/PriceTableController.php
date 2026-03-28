<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Http\Request;

class PriceTableController extends Controller
{
    public function index()
    {
        $products = Product::with('variations.attributeValues.attribute', 'category')
            ->where('type', 'variable')
            ->has('variations')
            ->latest()
            ->paginate(15);

        return view('admin.price-tables.index', compact('products'));
    }

    public function create()
    {
        $products = Product::where('type', 'variable')->orderBy('name')->get();
        $attributes = Attribute::with('values')->get();

        return view('admin.price-tables.create', compact('products', 'attributes'));
    }

    public function edit($id)
    {
        $product = Product::with('variations.attributeValues.attribute', 'variationSet.values.attribute')
            ->findOrFail($id);
        $attributes = Attribute::with('values')->get();

        return view('admin.price-tables.edit', compact('product', 'attributes'));
    }
}
