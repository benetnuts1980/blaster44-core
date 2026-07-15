<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Reservation;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;


class LatestReservations extends TableWidget
{
    protected static ?string $heading = 'Dernières réservations';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
{
    return $table
        ->query(
            Reservation::query()->latest()
        )
        ->columns([
            TextColumn::make('customer_name')
                ->label('Client'),

            TextColumn::make('formula.name')
                ->label('Formule'),

            TextColumn::make('terrain.name')
                ->label('Terrain'),

            TextColumn::make('reservation_date')
                ->label('Date')
                ->date('d/m/Y'),

            TextColumn::make('status')
                ->label('Statut')
                ->badge()
                ->formatStateUsing(fn (string $state): string => match ($state) {
                    'pending' => 'En attente',
                    'confirmed' => 'Confirmée',
                    'completed' => 'Terminée',
                    'cancelled' => 'Annulée',
                    default => $state,
                }),
        ]);
}
}