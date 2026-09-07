<?php

namespace App\Filament\Admin\Resources\Replicas\Pages;

use App\Filament\Admin\Resources\Replicas\ReplicaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditReplica extends EditRecord
{
    protected static string $resource = ReplicaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
