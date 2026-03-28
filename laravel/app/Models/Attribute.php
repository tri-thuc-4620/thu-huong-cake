<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends Model
{
    protected $fillable = [
        'name', 'slug', 'display_type', 'sort_order', 'is_filterable',
    ];

    protected $casts = [
        'is_filterable' => 'boolean',
    ];

    /* ── Relations ─────────────────────────────────── */

    public function values(): HasMany
    {
        return $this->hasMany(AttributeValue::class);
    }
}
