<?php

namespace App\Filament\Admin\Resources\Replicas\Pages;

use App\Filament\Admin\Resources\Replicas\ReplicaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListReplicas extends ListRecords
{
    protected static string $resource = ReplicaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
