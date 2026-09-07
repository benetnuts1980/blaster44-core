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

        Select::make('payment_method')
            ->label('Mode de paiement')
            ->options([
                'bank_transfer' => '🏦 Virement bancaire',
                'bancontact' => '💳 Bancontact',
                'card' => '💳 Carte bancaire',
                'paypal' => '🅿️ PayPal',
            ])
            ->default('bank_transfer')
            ->required(),

        Select::make('payment_option')
            ->label('Type de paiement')
            ->options([
                'deposit_30' => '30 % d’acompte',
                'full' => 'Paiement intégral',
            ])
            ->required(),

        TextInput::make('deposit')
            ->label('Montant à payer')
            ->numeric()
            ->suffix('€')
            ->required(),

        TextInput::make('amount_paid')
            ->label('Montant réellement payé')
            ->numeric()
            ->suffix('€')
            ->default(0)
            ->required(),

        Select::make('payment_status')
            ->label('Statut du paiement')
            ->options([
                'pending' => '🟠 En attente',
                'paid' => '🟢 Payé',
                'partial' => '🟡 Partiellement payé',
                'refunded' => '🔵 Remboursé',
            ])
            ->default('pending')
            ->required(),

        TextInput::make('paid_at')
            ->label('Paiement reçu le')
            ->disabled()
            ->dehydrated(false),

        Select::make('status')
            ->label('Statut de la réservation')
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