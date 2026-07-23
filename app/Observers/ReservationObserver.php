<?php

namespace App\Observers;

use App\Models\Reservation;

class ReservationObserver
{
    /**
     * Handle the Reservation "updated" event.
     */
    public function updated(Reservation $reservation): void
    {
        if (
            $reservation->wasChanged('status')
            && $reservation->status === 'completed'
            && $reservation->getOriginal('status') !== 'completed'
            && $reservation->user
        ) {
            $reservation->user->increment('points', 10);
            $reservation->user->increment('games_played', 1);
        }
    }
}
