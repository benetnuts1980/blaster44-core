@extends('layouts.app')

@section('title', 'Anniversaire Gel Blaster en Belgique | Blaster44')
@section('description', 'Organisez un anniversaire original avec une partie de Gel Blaster en Belgique. Une activité immersive pour groupes jusqu’à 20 joueurs.')

@section('content')

<x-navbar />

<div class="min-h-screen bg-[#0A0A0A] text-white pt-32 pb-20">

    <div class="max-w-5xl mx-auto px-6">

        <div class="text-center">

            <h1 class="text-6xl font-black mb-6">
                🎂 Anniversaire <span class="text-lime-400">Blaster44</span>
            </h1>

            <p class="text-xl text-gray-300">
                Une expérience inoubliable pour le héros du jour et ses amis.
            </p>

        </div>

        <div class="mt-12 bg-[#111111] rounded-3xl border border-lime-400/20 p-10">

            <div class="grid md:grid-cols-2 gap-8">

                <div>
                    <h2 class="text-3xl font-bold text-lime-400 mb-6">
                        Ce qui est inclus
                    </h2>

                    <ul class="space-y-4 text-lg">
                        <li>⏱️ 4 heures de jeu</li>
                        <li>🔫 Billes illimitées</li>
                        <li>🥤 Grenadine à volonté</li>
                        <li>🎉 Espace anniversaire réservé</li>
                        <li>🎁 Cadeau pour le héros du jour</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-3xl font-bold text-lime-400 mb-6">
                        Au choix
                    </h2>

                    <ul class="space-y-4 text-lg">
                        <li>🎂 Gâteau d'anniversaire fourni</li>
                    
                        <li>🎟️ Bon cadeau Blaster44 de 25€</li>
                        <li>🥤 Pack boissons et friandises pour le groupe</li>
                    </ul>
                </div>

            </div>

            <div class="mt-12 text-center">

                <div class="text-5xl font-black text-lime-400">
                    35€ / personne
                </div>

                <div class="text-gray-400 mt-2">
                    Minimum 8 joueurs
                </div>

                <a href="/reserver"
                   class="inline-block mt-8 bg-lime-400 text-black font-bold px-10 py-4 rounded-2xl hover:scale-105 transition">
                    🎂 Réserver un anniversaire
                </a>

            </div>

        </div>

    </div>

</div>

@endsection