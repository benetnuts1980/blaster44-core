<?php

namespace App\Filament\Admin\Resources\Reservations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReservationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer_name')
    ->label('Client')
    ->searchable()
    ->sortable(),

TextColumn::make('customer_phone')
    ->label('Téléphone'),
                TextColumn::make('customer_email')
                    ->searchable(),
                TextColumn::make('formula.name')
                    ->label('Formule')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('terrain.name')
                    ->label('Terrain')
                    ->searchable()
                    ->sortable(),
TextColumn::make('reservation_date')
    ->label('Date')
    ->date('d/m/Y'),

TextColumn::make('start_time')
    ->label('Heure')
    ->time('H:i'),

TextColumn::make('players_count')
    ->label('Joueurs'),

TextColumn::make('total_price')
    ->label('Prix')
    ->money('EUR'),
                TextColumn::make('deposit')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'En attente',
                        'confirmed' => 'Confirmée',
                        'completed' => 'Terminée',
                        'cancelled' => 'Annulée',
                        default => $state,
                    }),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
