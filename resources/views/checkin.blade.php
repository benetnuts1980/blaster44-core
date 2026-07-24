@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#0A0A0A] flex items-center justify-center p-6">

    <div class="bg-[#111111] border border-lime-400/20 rounded-3xl p-8 max-w-md w-full">

        <div class="text-center">

            <h1 class="text-4xl font-black text-lime-400 mb-6">
                🔫 BLASTER44
            </h1>

            <div class="text-2xl font-bold text-white">
                {{ $user->pseudo }}
            </div>

            <div class="mt-6 space-y-3 text-gray-300">

                <div>
                    🎯 Points :
                    <span class="text-lime-400 font-bold">
                        {{ $user->points }}
                    </span>
                </div>

                <div>
                    🔫 Parties :
                    <span class="text-lime-400 font-bold">
                        {{ $user->games_played }}
                    </span>
                </div>

            </div>

            <div class="mt-8 bg-green-500/10 border border-green-500 rounded-xl p-4">

    @if($alreadyCheckedToday)

    <div class="mt-8 bg-orange-500/10 border border-orange-500 rounded-xl p-4">

        <div class="text-orange-400 font-bold text-xl">
            ⚠️ Présence déjà enregistrée aujourd'hui
        </div>

    </div>

@else

    <div class="mt-8 bg-green-500/10 border border-green-500 rounded-xl p-4">

        <div class="text-green-400 font-bold text-xl">
            ✅ Présence validée
        </div>

        <div class="text-gray-300 mt-2">
            +10 points ajoutés<br>
            +1 partie enregistrée
        </div>

    </div>

@endif

    <div class="text-gray-300 mt-2">
        +10 points ajoutés
        <br>
        +1 partie enregistrée
    </div>

</div>

        </div>

    </div>

</div>

@endsection