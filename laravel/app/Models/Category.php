<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug', 'parent_id', 'description', 'image',
        'sort_order', 'is_visible', 'show_in_menu', 'show_on_home',
        'meta_title', 'meta_description',
    ];

    protected $casts = [
        'is_visible'   => 'boolean',
        'show_in_menu' => 'boolean',
        'show_on_home' => 'boolean',
    ];

    /* ── Relations ─────────────────────────────────── */

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
