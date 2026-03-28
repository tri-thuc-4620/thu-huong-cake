<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AttributeValue extends Model
{
    protected $fillable = [
        'attribute_id', 'name', 'slug', 'description',
        'display_value', 'sort_order',
    ];

    /* ── Relations ─────────────────────────────────── */

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }

    public function variationSets(): BelongsToMany
    {
        return $this->belongsToMany(VariationSet::class, 'variation_set_values')
                     ->withTimestamps();
    }

    public function productVariations(): BelongsToMany
    {
        return $this->belongsToMany(ProductVariation::class, 'product_variation_values')
                     ->withTimestamps();
    }
}
