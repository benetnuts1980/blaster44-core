@extends('layouts.app')

@section('title', 'Nos Terrains')

@section('content')

<x-navbar />

<div class="min-h-screen bg-[#0A0A0A] text-white pt-32 pb-20">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">

            <h1 class="text-6xl font-black">
                🏞️ Nos <span class="text-lime-400">Terrains</span>
            </h1>

            <p class="text-xl text-gray-400 mt-6">
                Trois univers différents pour trois expériences uniques.
            </p>

        </div>

        <div class="grid lg:grid-cols-3 gap-8">

            <div class="bg-[#111111] rounded-3xl overflow-hidden border border-lime-400/20">

                <div class="h-56 bg-black flex items-center justify-center text-gray-500">
                    📸 Photo à venir
                </div>

                <div class="p-8">

                    <h2 class="text-3xl font-black text-lime-400">
                        Le Futoir
                    </h2>

                    <p class="mt-4 text-gray-300">
                        Terrain idéal pour les plus jeunes joueurs.
                        Une zone accessible permettant de découvrir le Gel Blaster
                        en toute sécurité.
                    </p>

                    <div class="mt-6 text-sm text-gray-500">
                        👥 4 à 20 joueurs
                    </div>

                </div>

            </div>

            <div class="bg-[#111111] rounded-3xl overflow-hidden border border-lime-400/20">

                <div class="h-56 bg-black flex items-center justify-center text-gray-500">
                    📸 Photo à venir
                </div>

                <div class="p-8">

                    <h2 class="text-3xl font-black text-lime-400">
                        Le Marché
                    </h2>

                    <p class="mt-4 text-gray-300">
                        Terrain CQB rapide et dynamique.
                        Parfait pour les affrontements tactiques et les parties nerveuses.
                    </p>

                    <div class="mt-6 text-sm text-gray-500">
                        👥 4 à 20 joueurs
                    </div>

                </div>

            </div>

            <div class="bg-[#111111] rounded-3xl overflow-hidden border border-lime-400/20">

                <div class="h-56 bg-black flex items-center justify-center text-gray-500">
                    📸 Photo à venir
                </div>

                <div class="p-8">

                    <h2 class="text-3xl font-black text-lime-400">
                        Le Village
                    </h2>

                    <p class="mt-4 text-gray-300">
                        Terrain immersif destiné aux joueurs les plus aguerris.
                        Missions, stratégie et immersion totale.
                    </p>

                    <div class="mt-6 text-sm text-gray-500">
                        👥 4 à 20 joueurs
                    </div>

                </div>

            </div>

        </div>

        <div class="text-center mt-16">

            <a href="/reserver"
               class="bg-lime-400 text-black font-black px-10 py-5 rounded-2xl hover:scale-105 transition">

                🔫 Réserver une partie

            </a>

        </div>

    </div>

</div>

@endsection