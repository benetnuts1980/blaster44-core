@extends('layouts.app')

@section('title', 'Déroulement d'une partie de Gel Blaster | Blaster44')
@section('description', 'Découvrez comment se déroule une partie de Gel Blaster chez Blaster44 : accueil, équipement, briefing et parties immersives.')

@section('content')

<section class="relative overflow-hidden bg-[#0A0A0A] pt-32 pb-24">

    {{-- Halo --}}
    <div class="absolute top-20 left-1/2 -translate-x-1/2
                w-[500px] h-[500px]
                bg-lime-400/10 blur-[160px] rounded-full">
    </div>

    <div class="relative z-10 max-w-6xl mx-auto px-6">

        {{-- Introduction --}}
        <div class="text-center max-w-3xl mx-auto mb-20">

            <div class="inline-flex items-center gap-2
                        px-5 py-2 rounded-full
                        border border-lime-400/40
                        bg-lime-400/10
                        text-lime-400
                        font-black uppercase tracking-widest text-sm">
                🎯 Votre journée Blaster44
            </div>

            <h1 class="mt-6 text-4xl sm:text-5xl md:text-6xl
                       font-black uppercase text-white">
                Comment se déroule
                <span class="text-lime-400">une partie ?</span>
            </h1>

            <p class="mt-6 text-lg text-gray-300 leading-relaxed">
                Pas besoin d'être un expert. On vous explique tout,
                vous équipe, puis place à l'action !
            </p>

        </div>

        {{-- Étapes --}}
        <div class="space-y-8">

            {{-- Étape 1 --}}
            <div class="group flex flex-col md:flex-row gap-6
                        rounded-3xl border border-white/10
                        bg-[#111111] p-6 md:p-8
                        hover:border-lime-400/40 transition">

                <div class="shrink-0 flex items-center justify-center
                            w-16 h-16 rounded-2xl
                            bg-lime-400 text-black
                            text-3xl font-black">
                    1
                </div>

                <div>
                    <h2 class="text-2xl font-black text-white">
                        🕐 Accueil & briefing
                    </h2>

                    <p class="mt-3 text-gray-400 leading-relaxed">
                        À votre arrivée, notre équipe vous accueille et vous
                        explique le déroulement de la session ainsi que les
                        règles de sécurité.
                    </p>
                </div>

            </div>

            {{-- Étape 2 --}}
            <div class="group flex flex-col md:flex-row gap-6
                        rounded-3xl border border-white/10
                        bg-[#111111] p-6 md:p-8
                        hover:border-lime-400/40 transition">

                <div class="shrink-0 flex items-center justify-center
                            w-16 h-16 rounded-2xl
                            bg-lime-400 text-black
                            text-3xl font-black">
                    2
                </div>

                <div>
                    <h2 class="text-2xl font-black text-white">
                        🔫 Équipement
                    </h2>

                    <p class="mt-3 text-gray-400 leading-relaxed">
                        Nous vous fournissons votre réplique, vos billes de gel
                        et l'équipement nécessaire pour profiter de la partie
                        dans les meilleures conditions.
                    </p>
                </div>

            </div>

            {{-- Étape 3 --}}
            <div class="group flex flex-col md:flex-row gap-6
                        rounded-3xl border border-white/10
                        bg-[#111111] p-6 md:p-8
                        hover:border-lime-400/40 transition">

                <div class="shrink-0 flex items-center justify-center
                            w-16 h-16 rounded-2xl
                            bg-lime-400 text-black
                            text-3xl font-black">
                    3
                </div>

                <div>
                    <h2 class="text-2xl font-black text-white">
                        🎯 Prise en main
                    </h2>

                    <p class="mt-3 text-gray-400 leading-relaxed">
                        Une courte présentation vous permet de prendre en main
                        votre matériel et de comprendre les règles essentielles
                        avant de commencer.
                    </p>
                </div>

            </div>

            {{-- Étape 4 --}}
            <div class="group flex flex-col md:flex-row gap-6
                        rounded-3xl border border-white/10
                        bg-[#111111] p-6 md:p-8
                        hover:border-lime-400/40 transition">

                <div class="shrink-0 flex items-center justify-center
                            w-16 h-16 rounded-2xl
                            bg-lime-400 text-black
                            text-3xl font-black">
                    4
                </div>

                <div>
                    <h2 class="text-2xl font-black text-white">
                        💥 Place à l'action !
                    </h2>

                    <p class="mt-3 text-gray-400 leading-relaxed">
                        Les équipes sont formées, le scénario est lancé...
                        il ne reste plus qu'à jouer, communiquer et tenter
                        de remporter la victoire !
                    </p>
                </div>

            </div>

            {{-- Étape 5 --}}
            <div class="group flex flex-col md:flex-row gap-6
                        rounded-3xl border border-white/10
                        bg-[#111111] p-6 md:p-8
                        hover:border-lime-400/40 transition">

                <div class="shrink-0 flex items-center justify-center
                            w-16 h-16 rounded-2xl
                            bg-lime-400 text-black
                            text-3xl font-black">
                    5
                </div>

                <div>
                    <h2 class="text-2xl font-black text-white">
                        🏆 Fin de partie
                    </h2>

                    <p class="mt-3 text-gray-400 leading-relaxed">
                        Après les différents scénarios, place au bilan,
                        au classement et surtout aux souvenirs d'une bonne
                        session entre amis !
                    </p>
                </div>

            </div>

        </div>

        {{-- CTA --}}
        <div class="text-center mt-20">

            <h2 class="text-3xl sm:text-4xl font-black text-white">
                Prêt à passer à l'action ?
            </h2>

            <p class="mt-4 text-gray-400">
                Réservez votre session et venez découvrir le Gel Blaster.
            </p>

            <a href="/reserver"
               class="inline-block mt-8
                      bg-lime-400 text-black
                      font-black
                      px-10 py-4
                      rounded-2xl
                      hover:scale-105
                      transition
                      shadow-2xl shadow-lime-400/20">
                🔫 Réserver ma partie
            </a>

        </div>

    </div>

</section>

@endsection
