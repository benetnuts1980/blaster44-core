@extends('layouts.app')

@section('content')

@php
    $players = \App\Models\User::orderByDesc('points')
        ->orderByDesc('games_played')
        ->get();
@endphp

<div class="min-h-screen bg-[#0A0A0A] text-white py-12">

    <div class="max-w-5xl mx-auto px-6">

        <div class="bg-[#111111] border border-lime-400/20 rounded-3xl p-8 shadow-2xl shadow-lime-500/10">

            <h1 class="text-4xl font-black mb-2">
                🏆 Classement Blaster44
            </h1>

            <p class="text-gray-400 mb-8">
                Les meilleurs joueurs de la communauté
            </p>

            <div class="space-y-4">

                @foreach($players as $index => $player)

                    @php
                        if ($player->points >= 1000) {
                            $grade = '👑 Capitaine';
                        } elseif ($player->points >= 600) {
                            $grade = '🏅 Lieutenant';
                        } elseif ($player->points >= 300) {
                            $grade = '⭐ Sergent';
                        } elseif ($player->points >= 100) {
                            $grade = '🎖️ Soldat';
                        } else {
                            $grade = '🪖 Recrue';
                        }
                    @endphp

                    <div class="bg-black rounded-2xl p-5 border border-gray-800">

                        <div class="flex justify-between items-center">

                            <div class="flex items-center gap-4">

                                <div class="text-3xl">

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

                                    <div class="font-black text-xl">
                                        {{ $player->pseudo ?? $player->name }}
                                    </div>

                                    <div class="text-gray-400 text-sm">
                                        {{ $grade }}
                                    </div>

                                    <div class="text-gray-500 text-sm">
                                        {{ $player->games_played }} partie(s)
                                    </div>

                                </div>

                            </div>

                            <div class="text-right">

                                <div class="text-lime-400 text-2xl font-black">
                                    {{ $player->points }}
                                </div>

                                <div class="text-gray-500 text-sm">
                                    points
                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

            <div class="mt-8">
                <a
                    href="/dashboard"
                    class="bg-lime-400 hover:bg-lime-300 text-black font-black px-6 py-3 rounded-xl transition"
                >
                    ← Retour au dashboard
                </a>
            </div>

        </div>

    </div>

</div>

@endsection