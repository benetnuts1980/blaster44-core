@extends('layouts.app')

@section('title', 'Team Building Blaster44')

@section('content')

<x-navbar />

<div class="min-h-screen bg-[#0A0A0A] text-white pt-32 pb-20">

    <div class="max-w-5xl mx-auto px-6">

        <div class="text-center">

            <h1 class="text-6xl font-black mb-6">
                🏢 Team Building <span class="text-lime-400">Blaster44</span>
            </h1>

            <p class="text-xl text-gray-300">
                Renforcez la cohésion de vos équipes dans une expérience immersive et fun.
            </p>

        </div>

        <div class="mt-12 bg-[#111111] rounded-3xl border border-lime-400/20 p-10">

            <div class="grid md:grid-cols-2 gap-8">

                <div>

                    <h2 class="text-3xl font-bold text-lime-400 mb-6">
                        Inclus
                    </h2>

                    <ul class="space-y-4 text-lg">
                        <li>🏢 Activité entreprise</li>
                        <li>👥 Jusqu'à 20 participants</li>
                        <li>🎯 Missions coopératives</li>
                        <li>🏆 Classement des équipes</li>
                        <li>🎁 Remise des récompenses</li>
                    </ul>

                </div>

                <div>

                    <h2 class="text-3xl font-bold text-lime-400 mb-6">
                        Personnalisation
                    </h2>

                    <ul class="space-y-4 text-lg">
                        <li>📝 Scénarios sur mesure</li>
                        <li>🚗 Déplacement possible</li>
                        <li>🎤 Briefing personnalisé</li>
                        <li>🍔 Options repas possibles</li>
                        <li>📅 Organisation adaptée à votre entreprise</li>
                    </ul>

                </div>

            </div>

            <div class="mt-12 text-center">

                <div class="text-5xl font-black text-lime-400">
                    Sur devis
                </div>

                <div class="text-gray-400 mt-2">
                    Chaque événement est personnalisé selon vos besoins.
                </div>

                <a href="#contact"
                   class="inline-block mt-8 bg-lime-400 text-black font-bold px-10 py-4 rounded-2xl hover:scale-105 transition">
                    🏢 Demander un devis
                </a>

            </div>

        </div>

    </div>

</div>

@endsection