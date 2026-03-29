<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'name'             => 'required|min:1|max:255',
                    'slug'             => 'nullable|max:255|unique:categories,slug',
                    'parent_id'        => 'nullable|exists:categories,id',
                    'description'      => 'nullable|max:500|string',
                    'image'            => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
                    'sort_order'       => 'nullable|integer|min:0',
                    'is_visible'       => 'nullable|boolean',
                    'show_in_menu'     => 'nullable|boolean',
                    'show_on_home'     => 'nullable|boolean',
                    'meta_title'       => 'nullable|max:255|string',
                    'meta_description' => 'nullable|max:500|string',
                ];
            }
            case 'PUT': {
                return [
                    'name'             => 'required|min:1|max:255',
                    'slug'             => 'nullable|max:255|unique:categories,slug,' . $this->route('category'),
                    'parent_id'        => 'nullable|exists:categories,id',
                    'description'      => 'nullable|max:500|string',
                    'image'            => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
                    'sort_order'       => 'nullable|integer|min:0',
                    'is_visible'       => 'nullable|boolean',
                    'show_in_menu'     => 'nullable|boolean',
                    'show_on_home'     => 'nullable|boolean',
                    'meta_title'       => 'nullable|max:255|string',
                    'meta_description' => 'nullable|max:500|string',
                ];
            }
            case 'PATCH': {
                return [];
            }
            default:
                return [];
        }
    }

    public function attributes(): array
    {
        return [
            'name'             => 'Ten danh muc',
            'slug'             => 'Duong dan',
            'parent_id'        => 'Danh muc cha',
            'description'      => 'Mo ta',
            'image'            => 'Hinh anh',
            'sort_order'       => 'Thu tu',
            'meta_title'       => 'Tieu de SEO',
            'meta_description' => 'Mo ta SEO',
        ];
    }

    // messages() khong can - da cau hinh trong lang/vi/validation.php

    protected function prepareForValidation(): void
    {
        if (in_array($this->method(), ['GET', 'DELETE'])) return;

        if (!$this->filled('slug') && $this->filled('name')) {
            $this->merge(['slug' => Str::slug($this->input('name'))]);
        }

        $this->merge([
            'is_visible'   => $this->has('is_visible'),
            'show_in_menu' => $this->has('show_in_menu'),
            'show_on_home' => $this->has('show_on_home'),
        ]);
    }
}
