<?php

namespace App\Filament\Admin\Resources\Reservations\Pages;

use App\Filament\Admin\Resources\Reservations\ReservationResource;
use App\Models\Formula;
use App\Models\Reservation;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditReservation extends EditRecord
{
    protected static string $resource = ReservationResource::class;

    protected function getHeaderActions(): array
    {
        $phone = preg_replace('/[^0-9]/', '', $this->record->customer_phone);

        if (str_starts_with($phone, '0')) {
            $phone = '32' . substr($phone, 1);
        }

        return [

            Action::make('whatsapp')
                ->label('WhatsApp')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->color('success')
                ->url("https://wa.me/{$phone}", true),

            DeleteAction::make(),

        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $formula = Formula::find($data['formula_id']);

        if ($formula && Reservation::hasConflict(
            terrainId: (int) $data['terrain_id'],
            date: $data['reservation_date'],
            startTime: $data['start_time'],
            durationMinutes: $formula->duration,
            ignoreReservationId: $this->record->id,
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