<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class AttributeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'display_type' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer',
            'is_filterable' => 'boolean',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['is_filterable' => $this->has('is_filterable')]);

        if (!$this->filled('slug') && $this->filled('name')) {
            $this->merge(['slug' => Str::slug($this->input('name'))]);
        }
    }
}
