@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#0A0A0A] text-white py-12">

    <div class="max-w-5xl mx-auto px-6">

        <div class="bg-[#111111] border border-lime-400/20 rounded-3xl p-8 shadow-2xl shadow-lime-500/10">

            <h1 class="text-4xl font-black mb-2">
                🔫 {{ auth()->user()->pseudo }}
            </h1>

            <p class="text-gray-400 mb-8">
                Bienvenue dans votre espace joueur Blaster44
            </p>

            <div class="grid md:grid-cols-4 gap-6">

                @php
    $points = auth()->user()->points;

    if ($points >= 1000) {
        $grade = 'Capitaine';
        $nextGrade = 'MAX';
        $progress = 100;
    } elseif ($points >= 600) {
        $grade = 'Lieutenant';
        $nextGrade = 'Capitaine';
        $progress = (($points - 600) / 400) * 100;
    } elseif ($points >= 300) {
        $grade = 'Sergent';
        $nextGrade = 'Lieutenant';
        $progress = (($points - 300) / 300) * 100;
    } elseif ($points >= 100) {
        $grade = 'Soldat';
        $nextGrade = 'Sergent';
        $progress = (($points - 100) / 200) * 100;
    } else {
        $grade = 'Recrue';
        $nextGrade = 'Soldat';
        $progress = ($points / 100) * 100;
    }
@endphp

<div class="bg-black rounded-2xl p-6 border border-gray-800">
    <div class="text-gray-400 text-sm">
        Grade
    </div>

    <div class="text-3xl font-black text-lime-400 mt-2">
        {{ $grade }}
    </div>
@php
    $rank = \App\Models\User::where(
        'points',
        '>',
        auth()->user()->points
    )->count() + 1;

    $totalPlayers = \App\Models\User::count();
@endphp
@if($rank === 1)

    <div class="mt-8 bg-gradient-to-r from-yellow-500/20 to-lime-400/20 border border-yellow-500/30 rounded-2xl p-6">

        <div class="text-2xl font-black text-yellow-400">
            👑 Leader du classement
        </div>

        <div class="text-gray-300 mt-2">
            Félicitations ! Tu es actuellement le joueur numéro 1 de Blaster44.
        </div>

    </div>

@endif
<div class="bg-black rounded-2xl p-6 border border-gray-800">

    <div class="text-gray-400 text-sm">
        Classement
    </div>

    <div class="text-3xl font-black text-lime-400 mt-2">
        #{{ $rank }}
    </div>

    <div class="text-sm text-gray-500 mt-2">
        sur {{ $totalPlayers }} joueur(s)
    </div>
@php
    $completedGames = auth()->user()
        ->reservations()
        ->with(['terrain', 'formula'])
        ->where('status', 'completed')
        ->latest('reservation_date')
        ->limit(10)
        ->get();
@endphp

<div class="mt-10 bg-black rounded-2xl p-6 border border-gray-800">

    <h2 class="text-2xl font-bold mb-6">
        📜 Historique des parties
    </h2>

    @if($completedGames->isEmpty())

        <p class="text-gray-400">
            Aucune partie terminée pour le moment.
        </p>

    @else

        <div class="space-y-4">

            @foreach($completedGames as $game)

                <div class="bg-[#111111] rounded-xl p-4 border border-gray-800">

                    <div class="flex justify-between items-center">

                        <div>

                            <div class="font-bold text-lime-400">
                                {{ $game->terrain->name }}
                            </div>

                            <div class="text-gray-400 text-sm">
                                {{ $game->reservation_date->format('d/m/Y') }}
                                à
                                {{ substr($game->start_time, 0, 5) }}
                            </div>

                            <div class="text-gray-500 text-sm mt-1">
                                {{ $game->players_count }} joueur(s)
                            </div>

                        </div>

                        <div class="text-right">

                            <div class="text-green-400 font-bold">
                                ✔ Terminée
                            </div>

                            <div class="text-lime-400 text-sm mt-1">
                                +10 pts
                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</div>
</div>
    <div class="mt-4">
        <div class="flex justify-between text-xs text-gray-500 mb-1">
            <span>{{ $points }} pts</span>
            <span>{{ $nextGrade }}</span>
        </div>

        <div class="w-full h-2 bg-gray-800 rounded-full overflow-hidden">
            <div
                class="h-full bg-lime-400 rounded-full"
                style="width: {{ min(100, $progress) }}%;"
            ></div>
        </div>
        @if($nextGrade !== 'MAX')

    <div class="mt-3 text-sm text-gray-400">
        Prochain grade :
        <span class="text-lime-400 font-bold">
            {{ $nextGrade }}
        </span>
    </div>

@endif
    </div>
</div>

                <div class="bg-black rounded-2xl p-6 border border-gray-800">
                    <div class="text-gray-400 text-sm">
                        Points
                    </div>

                    <div class="text-3xl font-black text-lime-400 mt-2">
                        {{ auth()->user()->points }}
                    </div>
                </div>

                <div class="bg-black rounded-2xl p-6 border border-gray-800">
                    <div class="text-gray-400 text-sm">
                        Parties jouées
                    </div>

                    <div class="text-3xl font-black text-lime-400 mt-2">
                        {{ auth()->user()->games_played }}
                    </div>
                </div>
                

            </div>

            <div class="mt-10 bg-black rounded-2xl p-6 border border-gray-800">

    <h2 class="text-2xl font-bold mb-4">
        📅 Mes réservations
    </h2>

    @php
        $reservations = auth()->user()
            ->reservations()
            ->with(['terrain', 'formula'])
            ->latest()
            ->get();
    @endphp

    @if($reservations->isEmpty())

        <p class="text-gray-400">
            Aucune réservation associée à votre compte pour le moment.
        </p>

    @else

        <div class="space-y-4">

            @foreach($reservations as $reservation)

                <div class="bg-[#111111] border border-lime-400/20 rounded-xl p-4">

                    <div class="flex justify-between items-start">

                        <div>

                            <div class="font-bold text-lg text-lime-400">
                                {{ $reservation->terrain->name }}
                            </div>

                            <div class="text-gray-400">
                                {{ $reservation->reservation_date->format('d/m/Y') }}
                                à
                                {{ substr($reservation->start_time, 0, 5) }}
                            </div>

                            <div class="text-sm text-gray-500 mt-1">
                                {{ $reservation->players_count }} joueur(s)
                                •
                                {{ number_format($reservation->total_price, 2, ',', ' ') }} €
                            </div>

                        </div>

                        <div class="flex flex-col items-end gap-2">

    <div class="text-sm px-3 py-1 rounded-full bg-lime-400/10 text-lime-400">
        {{ ucfirst($reservation->status) }}
    </div>

    @php
        $canCancel =
            $reservation->status !== 'cancelled'
            &&
            now()->lt(
                \Carbon\Carbon::parse(
                    $reservation->reservation_date->format('Y-m-d')
                    .' '
                    .$reservation->start_time
                )->subHours(48)
            );
    @endphp

    @if($reservation->status === 'cancelled')

        <div class="text-red-400 text-sm font-semibold">
            ❌ Réservation annulée
        </div>

    @elseif($canCancel)

        <form
            method="POST"
            action="{{ route('reservation.cancel', $reservation) }}"
            onsubmit="return confirm('Annuler cette réservation ?');"
        >
            @csrf

            <button
                type="submit"
                class="bg-red-600 hover:bg-red-500 text-white text-sm px-3 py-2 rounded-lg transition"
            >
                Annuler
            </button>
        </form>

    @else

        <div class="text-orange-400 text-sm font-semibold">
            ⛔ Annulation impossible (&lt; 48h)
        </div>

    @endif

</div>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</div>
@php
    $topPlayers = \App\Models\User::orderByDesc('points')
        ->limit(5)
        ->get();
@endphp

<div class="mt-10 bg-black rounded-2xl p-6 border border-gray-800">

    <div class="flex justify-between items-center mb-6">

    <h2 class="text-2xl font-bold">
        🏆 Top Joueurs Blaster44
    </h2>

    <a
        href="/ranking"
        class="bg-yellow-500 hover:bg-yellow-400 text-black font-bold px-4 py-2 rounded-xl transition"
    >
        Classement complet →
    </a>

</div>

    <div class="space-y-3">

        @foreach($topPlayers as $index => $player)

            <div class="flex justify-between items-center bg-[#111111] rounded-xl p-4">

                <div class="flex items-center gap-3">

                    <div class="text-2xl">

                        @if($index === 0)
                            🥇
                        @elseif($index === 1)
                            🥈
                        @elseif($index === 2)
                            🥉
                        @else
                            🎯
                        @endif

                    </div>

                    <div>
                        <div class="font-bold text-white">
                            {{ $player->pseudo ?? $player->name }}
                        </div>

                        <div class="text-sm text-gray-500">
                            {{ $player->games_played }} partie(s)
                        </div>
                    </div>

                </div>

                <div class="text-lime-400 font-black text-xl">
                    {{ $player->points }} pts
                </div>

            </div>

        @endforeach

    </div>

</div>
@php
    $user = auth()->user();

    $firstGame = $user->games_played >= 1;
    $veteran = $user->games_played >= 5;
    $centurion = $user->points >= 100;
    $topThree = $rank <= 3;
    $leader = $rank === 1;
@endphp

<div class="mt-10 bg-black rounded-2xl p-6 border border-gray-800">

    <h2 class="text-2xl font-bold mb-6">
        🎖️ Mes succès
    </h2>

    <div class="grid md:grid-cols-2 gap-4">

        <div class="rounded-xl p-4 border {{ $firstGame ? 'border-lime-400 bg-lime-400/10' : 'border-gray-700 bg-[#111111]' }}">
            <div class="font-bold">
                🏅 Première partie
            </div>
            <div class="text-sm text-gray-400">
                Jouer sa première partie
            </div>
        </div>

        <div class="rounded-xl p-4 border {{ $veteran ? 'border-lime-400 bg-lime-400/10' : 'border-gray-700 bg-[#111111]' }}">
            <div class="font-bold">
                🎖️ Vétéran
            </div>
            <div class="text-sm text-gray-400">
                Jouer 5 parties
            </div>
        </div>

        <div class="rounded-xl p-4 border {{ $centurion ? 'border-lime-400 bg-lime-400/10' : 'border-gray-700 bg-[#111111]' }}">
            <div class="font-bold">
                ⭐ Centurion
            </div>
            <div class="text-sm text-gray-400">
                Atteindre 100 points
            </div>
        </div>

        <div class="rounded-xl p-4 border {{ $topThree ? 'border-lime-400 bg-lime-400/10' : 'border-gray-700 bg-[#111111]' }}">
            <div class="font-bold">
                🏆 Top 3
            </div>
            <div class="text-sm text-gray-400">
                Entrer dans le Top 3
            </div>
        </div>

        <div class="rounded-xl p-4 border {{ $leader ? 'border-yellow-400 bg-yellow-400/10' : 'border-gray-700 bg-[#111111]' }}">
            <div class="font-bold">
                👑 Leader
            </div>
            <div class="text-sm text-gray-400">
                Être numéro 1 du classement
            </div>
        </div>

    </div>

</div>

            <div class="mt-10 flex flex-wrap gap-4">

                <a
                    href="/reserver"
                    class="bg-lime-400 hover:bg-lime-300 text-black font-black px-6 py-3 rounded-xl transition"
                >
                    Réserver une partie
                </a>

                <a
                    href="/profile"
                    class="border border-lime-400 text-lime-400 px-6 py-3 rounded-xl hover:bg-lime-400 hover:text-black transition"
                >
                    Mon profil
                </a>
                <a
    href="/ranking"
    class="border border-yellow-400 text-yellow-400 px-6 py-3 rounded-xl hover:bg-yellow-400 hover:text-black transition"
>
    🏆 Classement complet
</a>

            </div>

        </div>

    </div>

</div>

@endsection