<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->isMethod('post')) {
            return [
                'title' => 'nullable|string|max:255',
                'image' => 'required|image|max:2048',
                'url' => 'nullable|string|max:500',
                'position' => 'nullable|string|max:50',
                'is_active' => 'boolean',
                'sort_order' => 'nullable|integer',
            ];
        }

        return [
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'url' => 'nullable|string|max:500',
            'position' => 'nullable|string|max:50',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['is_active' => $this->has('is_active')]);
    }
}
