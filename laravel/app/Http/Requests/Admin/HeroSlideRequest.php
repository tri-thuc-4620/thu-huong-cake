<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class HeroSlideRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->isMethod('post')) {
            $image = 'required|image|max:2048';
        } else {
            $image = 'nullable|image|max:2048';
        }

        return [
            'badge_text' => 'nullable|string|max:100',
            'title_line_1' => 'nullable|string|max:255',
            'title_line_2' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_1_text' => 'nullable|string|max:100',
            'button_1_url' => 'nullable|string|max:500',
            'button_2_text' => 'nullable|string|max:100',
            'button_2_url' => 'nullable|string|max:500',
            'image' => $image,
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['is_active' => $this->has('is_active')]);
    }
}
