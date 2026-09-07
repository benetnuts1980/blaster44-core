<?php

namespace App\Filament\Admin\Resources\Replicas;

use App\Filament\Admin\Resources\Replicas\Pages\CreateReplica;
use App\Filament\Admin\Resources\Replicas\Pages\EditReplica;
use App\Filament\Admin\Resources\Replicas\Pages\ListReplicas;
use App\Filament\Admin\Resources\Replicas\Schemas\ReplicaForm;
use App\Filament\Admin\Resources\Replicas\Tables\ReplicasTable;
use App\Models\Replica;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ReplicaResource extends Resource
{
    protected static ?string $model = Replica::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ReplicaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReplicasTable::configure($table);
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
            'index' => ListReplicas::route('/'),
            'create' => CreateReplica::route('/create'),
            'edit' => EditReplica::route('/{record}/edit'),
        ];
    }
}
