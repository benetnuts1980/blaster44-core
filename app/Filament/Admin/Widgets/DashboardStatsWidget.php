<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Formula;
use App\Models\Reservation;
use App\Models\Terrain;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $reservationsToday = Reservation::whereDate('reservation_date', today())->count();

        $playersToday = Reservation::whereDate('reservation_date', today())
            ->sum('players_count');

        $revenueTotal = Reservation::sum('total_price');

        $activeFormulas = Formula::where('active', true)->count();

        $activeTerrains = Terrain::where('is_active', true)->count();

        return [
            Stat::make('Réservations du jour', $reservationsToday)
                ->description('Réservations prévues aujourd\'hui')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('primary')
                ->icon('heroicon-o-calendar'),

            Stat::make('Joueurs du jour', $playersToday)
                ->description('Joueurs attendus aujourd\'hui')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary')
                ->icon('heroicon-o-users'),

            Stat::make(
                'Chiffre d\'affaires total',
                number_format($revenueTotal, 2, ',', ' ') . ' €'
            )
                ->description('Toutes les réservations')
                ->descriptionIcon('heroicon-m-credit-card')
                ->color('success')
                ->icon('heroicon-o-credit-card'),

            Stat::make('Formules actives', $activeFormulas)
                ->description('Paquets de jeu disponibles')
                ->descriptionIcon('heroicon-m-bolt')
                ->color('info')
                ->icon('heroicon-o-bolt'),

            Stat::make('Terrains actifs', $activeTerrains)
                ->description('Arènes disponibles')
                ->descriptionIcon('heroicon-m-map')
                ->color('warning')
                ->icon('heroicon-o-map'),
        ];
    }
}