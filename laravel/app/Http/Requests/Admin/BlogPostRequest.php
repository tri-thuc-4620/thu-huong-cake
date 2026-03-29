<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class BlogPostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'blog_category_id' => 'nullable|exists:blog_categories,id',
            'featured_image' => $this->isMethod('post') ? 'nullable|image|max:2048' : 'nullable|image|max:2048',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ];
    }

    protected function prepareForValidation()
    {
        if (!$this->filled('slug') && $this->filled('title')) {
            $this->merge(['slug' => Str::slug($this->input('title'))]);
        }

        $this->merge(['is_published' => $this->has('is_published')]);
    }
}
