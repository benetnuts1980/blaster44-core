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
        $reservationsToday = Reservation::whereDate(
            'reservation_date',
            today()
        )->count();

        $playersToday = Reservation::whereDate(
            'reservation_date',
            today()
        )->sum('players_count');

        $revenueMonth = Reservation::whereMonth(
            'reservation_date',
            now()->month
        )
            ->whereYear(
                'reservation_date',
                now()->year
            )
            ->sum('total_price');

        $pendingReservations = Reservation::where(
            'status',
            'pending'
        )->count();

        $activeTerrains = Terrain::where(
            'is_active',
            true
        )->count();

        $activeFormulas = Formula::where(
            'active',
            true
        )->count();

        return [

            Stat::make(
                'Réservations du jour',
                $reservationsToday
            )
                ->description('Parties prévues aujourd’hui')
                ->color('primary'),

            Stat::make(
                'Joueurs du jour',
                $playersToday
            )
                ->description('Joueurs attendus')
                ->color('success'),

            Stat::make(
                'CA du mois',
                number_format($revenueMonth, 2, ',', ' ') . ' €'
            )
                ->description('Réservations du mois')
                ->color('warning'),

            Stat::make(
                'En attente',
                $pendingReservations
            )
                ->description('Réservations à confirmer')
                ->color('danger'),

            Stat::make(
                'Terrains actifs',
                $activeTerrains
            )
                ->description('Terrains disponibles')
                ->color('info'),

            Stat::make(
                'Formules actives',
                $activeFormulas
            )
                ->description('Formules disponibles')
                ->color('gray'),
        ];
    }
}