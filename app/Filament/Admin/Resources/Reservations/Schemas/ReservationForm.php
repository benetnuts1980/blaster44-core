<?php

namespace App\Filament\Admin\Resources\Reservations\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use App\Models\Formula;
use App\Models\Reservation;
use Filament\Forms\Get;

class ReservationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('Client')
                ->schema([
                    TextInput::make('customer_name')
                        ->label('Nom')
                        ->required(),

                    TextInput::make('customer_phone')
                        ->label('Téléphone')
                        ->tel()
                        ->required(),

                    TextInput::make('customer_email')
                        ->label('Email')
                        ->email(),
                ])
                ->columns(2),

            Section::make('Réservation')
                ->schema([
                    Select::make('formula_id')
                        ->label('Formule')
                        ->relationship('formula', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),

                    Select::make('terrain_id')
                        ->label('Terrain')
                        ->relationship('terrain', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),

                    DatePicker::make('reservation_date')
                        ->label('Date')
                        ->required(),

                    TimePicker::make('start_time')
                        ->label('Heure')
                        ->required(),
                ])
                ->columns(2),

            Section::make('Participants')
                ->schema([
                    TextInput::make('players_count')
                        ->label('Nombre de joueurs')
                        ->numeric()
                        ->required(),
                ]),

            Section::make('Paiement')
                ->schema([
                    TextInput::make('total_price')
                        ->label('Prix total')
                        ->numeric()
                        ->suffix('€')
                        ->required(),

                    TextInput::make('deposit')
                        ->label('Acompte')
                        ->numeric()
                        ->suffix('€')
                        ->default(0),

                    Select::make('status')
                        ->label('Statut')
                        ->options([
                            'pending' => 'En attente',
                            'confirmed' => 'Confirmée',
                            'completed' => 'Terminée',
                            'cancelled' => 'Annulée',
                        ])
                        ->default('pending')
                        ->required(),
                ])
                ->columns(2),

            Section::make('Notes')
                ->schema([
                    Textarea::make('notes')
                        ->label('Notes')
                        ->columnSpanFull(),
                ]),
        ]);
    }
}