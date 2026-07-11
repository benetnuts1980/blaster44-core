<?php

namespace App\Filament\Admin\Resources\Formulas;

use App\Filament\Admin\Resources\Formulas\Pages\CreateFormula;
use App\Filament\Admin\Resources\Formulas\Pages\EditFormula;
use App\Filament\Admin\Resources\Formulas\Pages\ListFormulas;
use App\Filament\Admin\Resources\Formulas\Schemas\FormulaForm;
use App\Filament\Admin\Resources\Formulas\Tables\FormulasTable;
use App\Models\Formula;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FormulaResource extends Resource
{
    protected static ?string $model = Formula::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return FormulaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FormulasTable::configure($table);
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
            'index' => ListFormulas::route('/'),
            'create' => CreateFormula::route('/create'),
            'edit' => EditFormula::route('/{record}/edit'),
        ];
    }
}
