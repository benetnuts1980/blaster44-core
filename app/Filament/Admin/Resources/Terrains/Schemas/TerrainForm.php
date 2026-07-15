<?php

namespace App\Filament\Admin\Resources\Terrains\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class TerrainForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image(),
                Toggle::make('is_active')
                    ->required(),
                Toggle::make('is_indoor')
                    ->required(),
                TextInput::make('min_players')
                    ->required()
                    ->numeric()
                    ->default(2),
                TextInput::make('max_players')
                    ->required()
                    ->numeric()
                    ->default(12),
                TextInput::make('setup_time')
                    ->required()
                    ->numeric()
                    ->default(15),
                TextInput::make('cleanup_time')
                    ->required()
                    ->numeric()
                    ->default(10),
            ]);
    }
}
