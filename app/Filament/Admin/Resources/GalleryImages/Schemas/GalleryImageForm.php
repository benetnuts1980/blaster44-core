<?php

namespace App\Filament\Admin\Resources\GalleryImages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class GalleryImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),

                Textarea::make('description')
                    ->columnSpanFull(),
                    Select::make('category')
    ->label('Catégorie')
    ->options([
        'terrain' => '🏕️ Terrains',
        'materiel' => '🔫 Matériel',
        'jeux' => '🎯 Jeux',
        'infrastructure' => '🏢 Infrastructure',
    ])
    ->default('jeux')
    ->required(),

                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('gallery')
                    ->required(),

                Toggle::make('is_active')
                    ->required(),

                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}