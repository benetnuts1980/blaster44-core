<?php

namespace App\Filament\Admin\Resources\Replicas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ReplicaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nom de la réplique')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Description')
                    ->rows(4)
                    ->columnSpanFull(),

                Textarea::make('specifications')
                    ->label('Caractéristiques')
                    ->rows(6)
                    ->placeholder('Exemple :\nType : ...\nStyle : ...\nParticularités : ...')
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('Photo')
                    ->image()
                    ->disk('public')
                    ->directory('replicas')
                    ->imageEditor()
                    ->nullable(),

                Toggle::make('is_active')
                    ->label('Visible sur le site')
                    ->default(true)
                    ->required(),

                TextInput::make('sort_order')
                    ->label("Ordre d'affichage")
                    ->numeric()
                    ->default(0)
                    ->required(),
            ]);
    }
}