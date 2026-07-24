@extends('layouts.app')

@section('title', 'Mon profil')

@section('content')

<div class="min-h-screen bg-[#0A0A0A] text-white py-32">

    <div class="max-w-5xl mx-auto px-6">

        <h1 class="text-5xl font-black mb-10">
            👤 Mon <span class="text-lime-400">Profil</span>
        </h1>
        @php
    $rank = \App\Models\User::where(
        'points',
        '>',
        auth()->user()->points
    )->count() + 1;

    $points = auth()->user()->points;

    if ($points >= 1000) {
        $grade = 'Capitaine';
    } elseif ($points >= 600) {
        $grade = 'Lieutenant';
    } elseif ($points >= 300) {
        $grade = 'Sergent';
    } elseif ($points >= 100) {
        $grade = 'Soldat';
    } else {
        $grade = 'Recrue';
    }
@endphp

<div class="bg-[#111111] border border-lime-400/20 rounded-3xl p-8 mb-8 shadow-lg shadow-lime-500/10">

    <h2 class="text-3xl font-black text-lime-400 mb-6">
        🎖️ Fiche Joueur
    </h2>

    <div class="grid md:grid-cols-2 gap-6">

        <div>
            <div class="text-gray-500 text-sm">Pseudo</div>
            <div class="text-xl font-bold">{{ auth()->user()->pseudo }}</div>
        </div>

        <div>
            <div class="text-gray-500 text-sm">Téléphone</div>
            <div class="text-xl font-bold">
                {{ auth()->user()->phone ?? 'Non renseigné' }}
            </div>
        </div>

        <div>
            <div class="text-gray-500 text-sm">Grade</div>
            <div class="text-xl font-bold text-lime-400">
                {{ $grade }}
            </div>
        </div>

        <div>
            <div class="text-gray-500 text-sm">Classement</div>
            <div class="text-xl font-bold text-yellow-400">
                #{{ $rank }}
            </div>
        </div>

        <div>
            <div class="text-gray-500 text-sm">Points</div>
            <div class="text-xl font-bold">
                ⭐ {{ auth()->user()->points }}
            </div>
        </div>

        <div>
            <div class="text-gray-500 text-sm">Parties jouées</div>
            <div class="text-xl font-bold">
                🎮 {{ auth()->user()->games_played }}
            </div>
        </div>

    </div>

</div>

        <div class="space-y-8">

            <div class="bg-[#111111] border border-lime-400/20 rounded-3xl p-8 shadow-lg shadow-lime-500/10">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="bg-[#111111] border border-lime-400/20 rounded-3xl p-8 shadow-lg shadow-lime-500/10">
                @include('profile.partials.update-password-form')
            </div>

            <div class="bg-[#111111] border border-red-500/20 rounded-3xl p-8 shadow-lg shadow-red-500/10">
                @include('profile.partials.delete-user-form')
            </div>

        </div>

    </div>

</div>

@endsection
