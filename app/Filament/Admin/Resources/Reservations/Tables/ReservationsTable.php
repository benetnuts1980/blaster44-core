<?php

namespace App\Filament\Admin\Resources\Reservations\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use App\Mail\ReservationConfirmedMail;
use Illuminate\Support\Facades\Mail;

class ReservationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('reservation_date', 'asc')

            ->columns([

                TextColumn::make('customer_name')
                    ->label('Client')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('customer_phone')
                    ->label('Téléphone'),

                TextColumn::make('formula.name')
                    ->label('Formule')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('terrain.name')
                    ->label('Terrain')
                    ->sortable(),

                TextColumn::make('reservation_date')
                    ->label('Date')
                    ->date('d/m/Y')
                    ->sortable(),

                TextColumn::make('start_time')
                    ->label('Début')
                    ->time('H:i'),

                TextColumn::make('end_time')
                    ->label('Fin'),

                TextColumn::make('players_count')
                    ->label('Joueurs')
                    ->sortable(),

                TextColumn::make('total_price')
                    ->label('Prix')
                    ->money('EUR')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Statut')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'confirmed' => 'success',
                        'completed' => 'info',
                        'cancelled' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'En attente',
                        'confirmed' => 'Confirmée',
                        'completed' => 'Terminée',
                        'cancelled' => 'Annulée',
                        default => $state,
                    }),

            ])

            ->filters([

                SelectFilter::make('status')
                    ->label('Statut')
                    ->options([
                        'pending' => 'En attente',
                        'confirmed' => 'Confirmée',
                        'completed' => 'Terminée',
                        'cancelled' => 'Annulée',
                    ]),

            ])

            ->recordActions([

                Action::make('confirm')
    ->label('Confirmer')
    ->icon('heroicon-o-check-circle')
    ->color('success')
    ->visible(fn ($record) => $record->status === 'pending')
    ->action(function ($record) {

        $record->update([
            'status' => 'confirmed',
        ]);

        $record->load(['formula', 'terrain']);

        if ($record->customer_email) {
            Mail::to($record->customer_email)
                ->send(new ReservationConfirmedMail($record));
        }

        Notification::make()
            ->title('Réservation confirmée')
            ->body('Email de confirmation envoyé.')
            ->success()
            ->send();
    }),

                Action::make('complete')
                    ->label('Terminée')
                    ->icon('heroicon-o-flag')
                    ->color('info')
                    ->visible(fn ($record) => $record->status === 'confirmed')
                    ->action(function ($record) {
                        $record->update([
                            'status' => 'completed',
                        ]);

                        Notification::make()
                            ->title('Réservation terminée')
                            ->success()
                            ->send();
                    }),

                EditAction::make(),

            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}