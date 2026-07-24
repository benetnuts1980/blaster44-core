@extends('layouts.app')

@section('title', 'Blaster44')

@section('content')

<x-navbar />

<section id="home"
class="relative flex min-h-[85vh] items-center justify-center overflow-hidden">

    <!-- Image de fond -->
    <img
        src="{{ asset('images/hero.jpg') }}"
        class="absolute inset-0 h-full w-full object-cover scale-110"
        alt="Terrain">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/60 to-[#0A0A0A]"></div>

    <!-- Halo -->
    <div class="absolute w-[600px] h-[600px] bg-lime-400/10 blur-[180px] rounded-full"></div>

    <div class="relative z-10 text-center max-w-5xl px-6">

        <img
    src="{{ asset('images/logo.png') }}"
    class="mx-auto w-24 md:w-52 mb-6"
    alt="Blaster44">

        <span class="inline-block px-5 py-2 rounded-full border border-lime-400/30 bg-lime-400/10 text-lime-400 font-semibold mb-8">
            🔥 Belgique • Gel Blaster • Depuis 2026
        </span>

        <h1 class="text-4xl sm:text-5xl md:text-8xl font-black uppercase tracking-wider text-white leading-tight">
    L'adrénaline
    <span class="text-lime-400">commence ici</span>
</h1>

<p class="mt-6 text-lg sm:text-xl md:text-2xl text-gray-300 px-2">
    Terrain immersifs • Jusqu'à 20 joueurs
</p>

<p class="mt-2 text-lime-400 font-semibold">
    Réservez votre mission dès maintenant
</p>

        <p class="mt-8 text-xl text-gray-300 max-w-3xl mx-auto leading-9">

            Terrain immersifs • Anniversaires • Entreprises • Déplacement à domicile

        </p>

        <div class="grid grid-cols-3 gap-4 mt-12 max-w-3xl mx-auto text-white">

            <div>
                <div class="text-4xl font-black text-lime-400">20</div>
                <div>Joueurs</div>
            </div>

            <div>
    <div class="text-4xl font-black text-lime-400">1</div>
    <div>Terrain immersif</div>
</div>

            <div>
                <div class="text-4xl font-black text-lime-400">100%</div>
                <div>Formules</div>
            </div>

        </div>

        <div class="flex justify-center gap-6 mt-14 flex-wrap">

            <a href="/reserver"
               class="bg-lime-400 text-black font-bold px-10 py-5 rounded-2xl hover:scale-105 duration-300 shadow-2xl shadow-lime-400/30">

                🔫 Réserver

            </a>
            <a href="/register"
   class="border-2 border-yellow-400 text-yellow-400 font-bold px-10 py-5 rounded-2xl hover:bg-yellow-400 hover:text-black duration-300">
    👤 Créer un compte
</a>

            <a href="#formules"
               class="border-2 border-lime-400 text-lime-400 font-bold px-10 py-5 rounded-2xl hover:bg-lime-400 hover:text-black duration-300">

                Découvrir

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

            <p>🔫 Jusqu'à 12 joueurs</p>
<p>🏘️ Terrain immersif</p>
<p>🚗 Déplacement à domicile possible</p>

        </div>

        <div class="mt-10">

            <a href="https://wa.me/32473476373"
               target="_blank"
               class="bg-lime-400 text-black font-bold px-8 py-4 rounded-2xl">

                Réserver sur WhatsApp

            </a>

        </div>

    </div>

</section>

@endsection