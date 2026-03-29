<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class VariationSetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST':
                return [
                    'name' => 'required|string|max:255',
                    'slug' => 'nullable|max:255|unique:variation_sets,slug',
                    'description' => 'nullable|string',
                    'attribute_value_ids' => 'nullable|array',
                    'attribute_value_ids.*' => 'exists:attribute_values,id',
                    'is_active' => 'nullable|boolean',
                ];
            case 'PUT':
                return [
                    'name' => 'required|string|max:255',
                    'slug' => 'nullable|max:255|unique:variation_sets,slug,' . $this->route('variation_set'),
                    'description' => 'nullable|string',
                    'attribute_value_ids' => 'nullable|array',
                    'attribute_value_ids.*' => 'exists:attribute_values,id',
                    'is_active' => 'nullable|boolean',
                ];
            case 'PATCH':
                return [];
            default:
                return [];
        }
    }

    public function attributes(): array
    {
        return [
            'name' => 'Ten bo bien the',
            'slug' => 'Duong dan',
            'description' => 'Mo ta',
        ];
    }

    protected function prepareForValidation(): void
    {
        if (in_array($this->method(), ['GET', 'DELETE'])) return;

        if (!$this->filled('slug') && $this->filled('name')) {
            $this->merge(['slug' => Str::slug($this->input('name'))]);
        }

        $this->merge([
            'is_active' => $this->has('is_active'),
        ]);
    }
}
