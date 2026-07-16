<?php

namespace App\Filament\Admin\Resources\Reservations\Pages;

use App\Filament\Admin\Resources\Reservations\ReservationResource;
use App\Models\Formula;
use App\Models\Reservation;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateReservation extends CreateRecord
{
    protected static string $resource = ReservationResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $formula = Formula::find($data['formula_id']);

        if ($formula && Reservation::hasConflict(
            terrainId: (int) $data['terrain_id'],
            date: $data['reservation_date'],
            startTime: $data['start_time'],
            durationMinutes: $formula->duration,
        )) {
            Notification::make()
                ->title('Conflit de réservation')
                ->body('Le terrain est déjà réservé sur ce créneau.')
                ->danger()
                ->persistent()
                ->send();

            $this->halt();
        }

        return $data;
    }
}