<?php

namespace App\Filament\Admin\Resources\Formulas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FormulaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informations de base')
                    ->description('Détails principaux de la formule')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nom')
                            ->placeholder('Ex: Combat d\'équipe 30 min')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Description')
                            ->placeholder('Décrivez cette formule de jeu...')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Group::make()
                    ->schema([
                        Section::make('Tarification et durée')
                            ->schema([
                                TextInput::make('price')
                                    ->label('Prix')
                                    ->placeholder('0,00 €')
                                    ->numeric()
                                    ->inputMode('decimal')
                                    ->suffix('€')
                                    ->required()
                                    ->minValue(0),

                                TextInput::make('duration')
                                    ->label('Durée')
                                    ->placeholder('Ex: 30')
                                    ->numeric()
                                    ->inputMode('numeric')
                                    ->suffix('min')
                                    ->required()
                                    ->minValue(1),
                            ])
                            ->columns(2),

                        Section::make('Joueurs')
                            ->schema([
                                TextInput::make('min_players')
                                    ->label('Minimum')
                                    ->placeholder('Ex: 2')
                                    ->numeric()
                                    ->inputMode('numeric')
                                    ->required()
                                    ->minValue(1)
                                    ->default(2),

                                TextInput::make('max_players')
                                    ->label('Maximum')
                                    ->placeholder('Ex: 20')
                                    ->numeric()
                                    ->inputMode('numeric')
                                    ->required()
                                    ->minValue(1)
                                    ->default(20),
                            ])
                            ->columns(2),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Statut et média')
                    ->schema([
                        Toggle::make('active')
                            ->label('Actif')
                            ->default(true)
                            ->inline(false),

                        FileUpload::make('image')
    ->label('Image')
    ->image()
    ->imageEditor()
    ->disk('public')
    ->directory('formulas')
                    ])
                    ->columns(2),
            ]);
    }
}

