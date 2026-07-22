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

            <div class="grid md:grid-cols-3 gap-6">

                <div class="bg-black rounded-2xl p-6 border border-gray-800">
                    <div class="text-gray-400 text-sm">
                        Grade
                    </div>

                    <div class="text-3xl font-black text-lime-400 mt-2">
                        Recrue
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

                        <div class="text-sm px-3 py-1 rounded-full bg-lime-400/10 text-lime-400">
                            {{ ucfirst($reservation->status) }}
                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

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

            </div>

        </div>

    </div>

</div>

@endsection