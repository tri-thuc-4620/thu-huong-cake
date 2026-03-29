<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'short_name' => 'nullable|string|max:100',
            'address' => 'required|string|max:500',
            'city' => 'nullable|string|max:100',
            'district' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'google_maps_url' => 'nullable|url|max:500',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['is_active' => $this->has('is_active')]);
    }
}
