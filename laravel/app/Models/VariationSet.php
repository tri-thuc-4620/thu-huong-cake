<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VariationSet extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /* ── Relations ─────────────────────────────────── */

    public function values(): BelongsToMany
    {
        return $this->belongsToMany(AttributeValue::class, 'variation_set_values')
                     ->withTimestamps();
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
