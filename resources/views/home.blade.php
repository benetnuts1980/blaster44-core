@extends('layouts.app')

@section('title', 'Blaster44')

@section('content')

<x-navbar />

<section id="home" class="relative flex min-h-screen items-center justify-center overflow-hidden">

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
            class="mx-auto w-64 md:w-80 mb-8 drop-shadow-[0_0_40px_rgba(166,255,0,0.35)]"
            alt="Blaster44">

        <span class="inline-block px-5 py-2 rounded-full border border-lime-400/30 bg-lime-400/10 text-lime-400 font-semibold mb-8">
            🔥 Belgique • Gel Blaster • Depuis 2026
        </span>

        <h1 class="text-6xl md:text-8xl font-black uppercase tracking-wider text-white">
            L'adrénaline
            <span class="text-lime-400">commence ici</span>
        </h1>

        <p class="mt-8 text-xl text-gray-300 max-w-3xl mx-auto leading-9">

            Deux terrains immersifs • Jusqu'à 20 joueurs • Anniversaires • Entreprises • Déplacement à domicile

        </p>

        <div class="grid grid-cols-3 gap-6 mt-12 max-w-3xl mx-auto text-white">

            <div>
                <div class="text-4xl font-black text-lime-400">20+</div>
                <div>Joueurs</div>
            </div>

            <div>
                <div class="text-4xl font-black text-lime-400">2</div>
                <div>Terrains</div>
            </div>

            <div>
                <div class="text-4xl font-black text-lime-400">100%</div>
                <div>Fun</div>
            </div>

        </div>

        <div class="flex justify-center gap-6 mt-14 flex-wrap">

            <a href="#reservation"
               class="bg-lime-400 text-black font-bold px-10 py-5 rounded-2xl hover:scale-105 duration-300 shadow-2xl shadow-lime-400/30">

                🔫 Réserver

            </a>

            <a href="#formules"
               class="border-2 border-lime-400 text-lime-400 font-bold px-10 py-5 rounded-2xl hover:bg-lime-400 hover:text-black duration-300">

                Découvrir

            </a>

        </div>

    </div>

</section>

@include('partials.features')

@endsection