<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Replica extends Model
{
    protected $fillable = [
        'name',
        'description',
        'specifications',
        'image',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}