<?php

namespace App\Filament\Admin\Resources\Formulas\Pages;

use App\Filament\Admin\Resources\Formulas\FormulaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFormula extends EditRecord
{
    protected static string $resource = FormulaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
