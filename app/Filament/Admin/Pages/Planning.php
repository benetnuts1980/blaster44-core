<?php

namespace App\Filament\Admin\Pages;

use BackedEnum;
use Filament\Pages\Page;

class Planning extends Page
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationLabel = 'Planning';

    protected static ?string $title = 'Planning des réservations';

    protected string $view = 'filament.admin.pages.planning';
}