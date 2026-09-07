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
                    ->label('Total')
                    ->money('EUR')
                    ->sortable(),

                TextColumn::make('deposit')
                    ->label('À payer')
                    ->money('EUR')
                    ->sortable(),

                TextColumn::make('amount_paid')
                    ->label('Payé')
                    ->money('EUR')
                    ->sortable(),

                TextColumn::make('remaining_amount')
                    ->label('Reste')
                    ->state(fn ($record) => max(
                        0,
                        (float) $record->deposit - (float) $record->amount_paid
                    ))
                    ->money('EUR')
                    ->color(fn ($state) => (float) $state > 0 ? 'warning' : 'success'),    

                TextColumn::make('payment_option')
                    ->label('Type')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'deposit_30' => '30 %',
                        'full' => 'Intégral',
                        default => '—',
                    })
                    ->color(fn (?string $state): string => match ($state) {
                        'deposit_30' => 'warning',
                        'full' => 'info',
                        default => 'gray',
                    }),

                TextColumn::make('payment_status')
                    ->label('Paiement')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'pending' => 'En attente',
                        'partial' => 'Partiel',
                        'paid' => 'Payé',
                        'refunded' => 'Remboursé',
                        default => $state ?? '—',
                    })
                    ->color(fn (?string $state): string => match ($state) {
                        'pending' => 'warning',
                        'partial' => 'info',
                        'paid' => 'success',
                        'refunded' => 'gray',
                        default => 'gray',
                    }),

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

                SelectFilter::make('payment_status')
                    ->label('Paiement')
                    ->options([
                        'pending' => 'En attente',
                        'partial' => 'Partiellement payé',
                        'paid' => 'Payé',
                        'refunded' => 'Remboursé',
                    ]),

            ])

            ->recordActions([

                Action::make('payment_received')
                    ->label('Paiement reçu')
                    ->icon('heroicon-o-banknotes')
                    ->color('success')
                    ->visible(fn ($record) =>
                        $record->payment_status !== 'paid'
                        && (float) $record->deposit > 0
                    )
                    ->requiresConfirmation()
                    ->modalHeading('Confirmer la réception du paiement')
                    ->modalDescription(
                        fn ($record) => 'Le montant de '
                            . number_format((float) $record->deposit, 2, ',', ' ')
                            . ' € sera enregistré comme reçu et le paiement sera marqué comme payé.'
                    )
                    ->action(function ($record) {

                        $record->update([
                            'amount_paid' => $record->deposit,
                            'payment_status' => 'paid',
                            'paid_at' => now(),
                        ]);

                        Notification::make()
                            ->title('Paiement enregistré')
                            ->body(
                                'Le paiement de '
                                . number_format((float) $record->deposit, 2, ',', ' ')
                                . ' € a été enregistré.'
                            )
                            ->success()
                            ->send();
                    }),

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