<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Terrain extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'is_active',
        'is_indoor',
        'min_players',
        'max_players',
        'setup_time',
        'cleanup_time',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_indoor' => 'boolean',
    ];
    public function reservations(): HasMany
{
    return $this->hasMany(Reservation::class);
}
}