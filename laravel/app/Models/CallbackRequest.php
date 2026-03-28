<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallbackRequest extends Model
{
    protected $fillable = [
        'name', 'phone', 'note', 'is_handled', 'handled_at',
    ];

    protected $casts = [
        'is_handled' => 'boolean',
        'handled_at' => 'datetime',
    ];
}
