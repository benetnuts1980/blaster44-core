<?php

namespace App\Filament\Admin\Resources\Terrains\Pages;

use App\Filament\Admin\Resources\Terrains\TerrainResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTerrains extends ListRecords
{
    protected static string $resource = TerrainResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
