<?php

namespace App\Filament\Admin\Resources\Formulas\Pages;

use App\Filament\Admin\Resources\Formulas\FormulaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFormulas extends ListRecords
{
    protected static string $resource = FormulaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
