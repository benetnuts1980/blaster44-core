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

                <p class="text-gray-400">
                    Aucune réservation associée à votre compte pour le moment.
                </p>

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