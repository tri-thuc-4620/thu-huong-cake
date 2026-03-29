<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PageRequest extends FormRequest
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
                    'title' => 'required|string|max:255',
                    'slug' => 'nullable|max:255|unique:pages,slug',
                    'content' => 'nullable|string',
                    'layout' => 'nullable|string|max:50',
                    'is_published' => 'nullable|boolean',
                    'meta_title' => 'nullable|string|max:255',
                    'meta_description' => 'nullable|string',
                ];
            case 'PUT':
                return [
                    'title' => 'required|string|max:255',
                    'slug' => 'nullable|max:255|unique:pages,slug,' . $this->route('page'),
                    'content' => 'nullable|string',
                    'layout' => 'nullable|string|max:50',
                    'is_published' => 'nullable|boolean',
                    'meta_title' => 'nullable|string|max:255',
                    'meta_description' => 'nullable|string',
                ];
            default:
                return [];
        }
    }

    protected function prepareForValidation()
    {
        if (in_array($this->method(), ['GET', 'DELETE'])) return;

        if (!$this->filled('slug') && $this->filled('title')) {
            $this->merge(['slug' => Str::slug($this->input('title'))]);
        }

        $this->merge([
            'is_published' => $this->has('is_published'),
        ]);
    }
}
