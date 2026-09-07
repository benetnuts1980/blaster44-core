<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;
use App\Models\User;

class Reservation extends Model
{
    protected $fillable = [
    'user_id',
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
    'payment_method',
    'payment_option',
    'amount_paid',
    'paid_at',
    'payment_status',
];

    protected $casts = [
        'reservation_date' => 'date',
        
        'total_price' => 'decimal:2',
        'deposit' => 'decimal:2',
        'players_count' => 'integer',
        'amount_paid' => 'decimal:2',
        'paid_at' => 'datetime',
    ];
    public function formula(): BelongsTo
{
    return $this->belongsTo(Formula::class);
}

public function terrain(): BelongsTo
{
    return $this->belongsTo(Terrain::class);
}
public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}
public function getEndTimeAttribute(): ?string
{
    if (! $this->start_time || ! $this->formula) {
        return null;
    }

    return \Carbon\Carbon::parse($this->start_time)
        ->addMinutes($this->formula->duration)
        ->format('H:i');
}
public static function hasConflict(
    int $terrainId,
    string $date,
    string $startTime,
    int $durationMinutes,
    ?int $ignoreReservationId = null,
): bool {
    $newStart = Carbon::parse($startTime);
    $newEnd = (clone $newStart)->addMinutes($durationMinutes);

    $query = self::with('formula')
        ->where('terrain_id', $terrainId)
        ->whereDate('reservation_date', $date);

    if ($ignoreReservationId) {
        $query->where('id', '!=', $ignoreReservationId);
    }

    foreach ($query->get() as $reservation) {

    $existingStart = Carbon::parse($reservation->start_time);

    $existingEnd = (clone $existingStart)
        ->addMinutes($reservation->formula->duration);

    if ($newStart < $existingEnd && $newEnd > $existingStart) {
        return true;
    }
    
}

return false;
}
}