<?php

namespace App\Filament\Admin\Resources\Terrains;

use App\Filament\Admin\Resources\Terrains\Pages\CreateTerrain;
use App\Filament\Admin\Resources\Terrains\Pages\EditTerrain;
use App\Filament\Admin\Resources\Terrains\Pages\ListTerrains;
use App\Filament\Admin\Resources\Terrains\Schemas\TerrainForm;
use App\Filament\Admin\Resources\Terrains\Tables\TerrainsTable;
use App\Models\Terrain;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TerrainResource extends Resource
{
    protected static ?string $model = Terrain::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return TerrainForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TerrainsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTerrains::route('/'),
            'create' => CreateTerrain::route('/create'),
            'edit' => EditTerrain::route('/{record}/edit'),
        ];
    }
}
