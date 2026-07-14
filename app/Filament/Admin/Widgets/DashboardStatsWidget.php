<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

/**
 * Dashboard Stats Widget
 * 
 * Displays key performance indicators for the Blaster44 admin dashboard.
 * Shows real-time metrics for reservations, players, revenue, and available resources.
 */
class DashboardStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            // TODO: Replace with query when Booking model is available
            // $reservationsToday = Booking::whereDate('created_at', today())->count();
            Stat::make('Réservations du jour', '0')
                ->description('Réservations créées aujourd\'hui')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('primary')
                ->icon('heroicon-o-calendar'),

            // TODO: Replace with query when GameSession and Player models are available
            // $playersToday = DB::table('player_game_sessions')
            //     ->join('game_sessions', 'player_game_sessions.game_session_id', '=', 'game_sessions.id')
            //     ->whereDate('game_sessions.created_at', today())
            //     ->distinct('player_game_sessions.user_id')
            //     ->count('player_game_sessions.user_id');
            Stat::make('Joueurs du jour', '0')
                ->description('Joueurs uniques en jeu aujourd\'hui')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary')
                ->icon('heroicon-o-users'),

            // TODO: Replace with query when Payment model is available
            // $revenue = Payment::where('status', 'completed')
            //     ->whereDate('created_at', today())
            //     ->sum('amount');
            // $formatted = number_format($revenue, 2, ',', ' ') . ' €';

Stat::make('Chiffre d\'affaires du jour', '0,00 €')
    ->description('Paiements traités aujourd\'hui')
    ->descriptionIcon('heroicon-m-credit-card')
    ->color('success')
    ->icon('heroicon-o-credit-card'),
            // TODO: Replace with query when Formula model is available
            // $activeFormulas = Formula::where('active', true)->count();
            Stat::make('Formules actives', '0')
                ->description('Paquets de jeu disponibles')
                ->descriptionIcon('heroicon-m-bolt')
                ->color('info')
                ->icon('heroicon-o-bolt'),

            // TODO: Replace with query when Room/Terrain model is available
            // $activeTerrains = Room::where('active', true)->count();
            // 
            // Multi-location example:
            // $activeTerrains = Room::where('center_id', auth()->user()->center_id)
            //     ->where('active', true)
            //     ->count();
            Stat::make('Terrains actifs', '0')
                ->description('Arènes disponibles')
                ->descriptionIcon('heroicon-m-map')
                ->color('warning')
                ->icon('heroicon-o-map'),
        ];
    }
}
