<?php

namespace App\Filament\Admin\Resources\Formulas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class FormulasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nom')
                    ->searchable()
                    ->sortable()
                    ->grow(),

                TextColumn::make('price')
                    ->label('Prix')
                    ->sortable()
                    ->formatStateUsing(fn(float $state): string => number_format($state, 2, ',', ' ') . ' €')
                    ->alignment('right'),

                TextColumn::make('duration')
                    ->label('Durée')
                    ->sortable()
                    ->formatStateUsing(fn(int $state): string => $state . ' min')
                    ->alignment('center'),

                TextColumn::make('players')
                    ->label('Joueurs')
                    ->getStateUsing(fn(object $record): string => $record->min_players . ' - ' . $record->max_players)
                    ->sortable('min_players')
                    ->alignment('center'),

                ToggleColumn::make('active')
                    ->label('Actif')
                    ->sortable()
                    ->alignment('center'),

                TextColumn::make('created_at')
                    ->label('Créé le')
                    ->sortable()
                    ->dateTime('d/m/Y H:i')
                    ->alignment('right'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
