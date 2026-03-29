<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST':
                return [
                    'name' => 'required|string|max:255',
                    'slug' => 'nullable|max:255|unique:products,slug',
                    'category_id' => 'nullable|exists:categories,id',
                    'price' => 'required|numeric|min:0',
                    'sale_price' => 'nullable|numeric|min:0',
                    'images' => 'nullable|array',
                    'images.*' => 'nullable|image|max:2048',
                    'featured_image' => 'nullable|image|max:2048',
                    'tags' => 'nullable|string',
                    'variation_type' => 'nullable|string',
                    'cake_base' => 'nullable|array',
                    'cake_size' => 'nullable|array',
                    'is_visible' => 'nullable|boolean',
                    'is_hot' => 'nullable|boolean',
                ];
            case 'PUT':
                return [
                    'name' => 'required|string|max:255',
                    'slug' => 'nullable|max:255|unique:products,slug,' . $this->route('product'),
                    'category_id' => 'nullable|exists:categories,id',
                    'price' => 'nullable|numeric|min:0',
                    'sale_price' => 'nullable|numeric|min:0',
                    'images' => 'nullable|array',
                    'images.*' => 'nullable|image|max:2048',
                    'featured_image' => 'nullable|image|max:2048',
                    'tags' => 'nullable|string',
                    'variation_type' => 'nullable|string',
                    'cake_base' => 'nullable|array',
                    'cake_size' => 'nullable|array',
                    'is_visible' => 'nullable|boolean',
                    'is_hot' => 'nullable|boolean',
                ];
            default:
                return [];
        }
    }

    protected function prepareForValidation()
    {
        if (in_array($this->method(), ['GET', 'DELETE'])) return;

        if (!$this->filled('slug') && $this->filled('name')) {
            $this->merge(['slug' => Str::slug($this->input('name'))]);
        }

        $this->merge([
            'is_visible' => $this->has('is_visible'),
            'is_hot' => $this->has('is_hot'),
        ]);
    }
}
