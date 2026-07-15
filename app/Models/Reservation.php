<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_email',
        'formula_id',
        'terrain_id',
        'reservation_date',
        'start_time',
        'players_count',
        'total_price',
        'deposit',
        'status',
        'notes',
    ];

    protected $casts = [
        'reservation_date' => 'date',
        
        'total_price' => 'decimal:2',
        'deposit' => 'decimal:2',
        'players_count' => 'integer',
    ];
    public function formula(): BelongsTo
{
    return $this->belongsTo(Formula::class);
}

public function terrain(): BelongsTo
{
    return $this->belongsTo(Terrain::class);
}
}
