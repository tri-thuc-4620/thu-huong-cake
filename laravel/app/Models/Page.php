<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'layout',
        'is_published',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'layout' => 'string',
        'is_published' => 'boolean',
    ];
}
