<?php

namespace App\Filament\Admin\Resources\Terrains\Pages;

use App\Filament\Admin\Resources\Terrains\TerrainResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTerrain extends EditRecord
{
    protected static string $resource = TerrainResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
