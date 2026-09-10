@extends('layouts.app')

@section('title', 'Gel Blaster en Belgique | Blaster44')
@section('description', 'Découvrez le Gel Blaster en Belgique avec Blaster44 : parties immersives, terrains et formules pour groupes jusqu’à 20 joueurs.')



@section('content')

<section id="home"
    class="relative flex min-h-[90vh] items-center justify-center overflow-hidden">

    <!-- Image de fond -->
    <img
        src="{{ asset('images/hero.jpg') }}"
        class="absolute inset-0 h-full w-full object-cover object-top"
        alt="Terrain de Gel Blaster">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/35 to-[#0A0A0A]"></div>
    <!-- Halo -->
    <div class="absolute w-[600px] h-[600px] bg-lime-400/10 blur-[180px] rounded-full"></div>

    <div class="relative z-10 text-center max-w-5xl px-6 pt-16">

        <!-- Identification immédiate -->
        <div class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full border border-lime-400/40 bg-lime-400/10 text-lime-400 font-black uppercase tracking-widest text-sm sm:text-base mb-6">
            🔫 Gel Blaster en Belgique
        </div>

        <h1 class="text-4xl sm:text-5xl md:text-7xl font-black uppercase tracking-wider text-white leading-tight">
            L'adrénaline
            <span class="block text-lime-400">commence ici</span>
        </h1>

        <p class="mt-6 text-lg sm:text-xl md:text-2xl text-gray-200 max-w-3xl mx-auto leading-relaxed">
            Vivez une véritable partie de <strong class="text-white">Gel Blaster</strong>
            sur des terrains immersifs.
        </p>

        <p class="mt-3 text-lime-400 font-bold text-lg">
            👥 Jusqu'à 20 joueurs • 🎯 Parties immersives • 🇧🇪 Belgique
        </p>

        <!-- Actions -->
        <div class="flex justify-center gap-4 sm:gap-6 mt-10 flex-wrap">

            <a href="/reserver"
               class="bg-lime-400 text-black font-black px-8 sm:px-10 py-4 sm:py-5 rounded-2xl hover:scale-105 duration-300 shadow-2xl shadow-lime-400/30">
                🔫 Réserver une partie
            </a>

            <a href="#formules"
               class="border-2 border-lime-400 text-lime-400 font-bold px-8 sm:px-10 py-4 sm:py-5 rounded-2xl hover:bg-lime-400 hover:text-black duration-300">
                Découvrir nos formules
            </a>

        </div>

    </div>

</section>

@include('partials.features')

<section id="contact" class="bg-[#0A0A0A] py-24">

    <div class="max-w-4xl mx-auto px-6 text-center">

        <h2 class="text-5xl font-black text-white mb-8">
            Contact <span class="text-lime-400">Blaster44</span>
        </h2>

        <div class="space-y-4 text-xl text-gray-300">

            <p>📍 Rue de la Gazéification</p>
            <p>7350 Thulin (Hensies)</p>

            <p>📱 0471 85 29 79</p>

            <p>🔫 Jusqu'à 20 joueurs</p>
<p>🏘️ Terrain immersif</p>
<p>🚗 Déplacement à domicile possible</p>

        </div>

        <div class="mt-10">

            <a href="https://wa.me/32471852979"
               target="_blank"
               class="bg-lime-400 text-black font-bold px-8 py-4 rounded-2xl">

                Réserver sur WhatsApp

            </a>

        </div>

    </div>

</section>

@endsection