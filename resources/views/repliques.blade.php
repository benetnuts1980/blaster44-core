@extends('layouts.app')

@section('title', 'Nos répliques | Blaster44')

@section('content')

@php
    $replicas = \App\Models\Replica::where('is_active', true)
        ->orderBy('sort_order')
        ->orderBy('name')
        ->get();
@endphp

<section class="relative overflow-hidden bg-[#0A0A0A] pt-32 pb-24">

    {{-- Halo --}}
    <div class="absolute top-20 left-1/2 -translate-x-1/2
                w-[600px] h-[600px]
                bg-lime-400/10 blur-[180px] rounded-full">
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6">

        {{-- Introduction --}}
        <div class="text-center max-w-3xl mx-auto mb-20">

            <div class="inline-flex items-center gap-2
                        px-5 py-2 rounded-full
                        border border-lime-400/40
                        bg-lime-400/10
                        text-lime-400
                        font-black uppercase tracking-widest text-sm">
                🔫 Arsenal Blaster44
            </div>

            <h1 class="mt-6 text-4xl sm:text-5xl md:text-6xl
                       font-black uppercase text-white">
                Nos <span class="text-lime-400">répliques</span>
            </h1>

            <p class="mt-6 text-lg text-gray-300 leading-relaxed">
                Découvrez les répliques disponibles lors de nos parties
                de Gel Blaster.
            </p>

        </div>

        {{-- Liste des répliques --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

            @forelse($replicas as $replica)

                <article
                    class="group overflow-hidden rounded-3xl
                           border border-white/10
                           bg-[#111111]
                           hover:border-lime-400/40
                           transition duration-300"
                >

                    {{-- Photo --}}
                    <div class="relative h-72 bg-black/30 overflow-hidden">

                        @if($replica->image)

                            <img
                                src="{{ asset($replica->image) }}"
                                alt="{{ $replica->name }}"
                                class="w-full h-full object-cover
                                       transition duration-500
                                       group-hover:scale-105"
                            >

                        @else

                            <div class="absolute inset-0
                                        flex items-center justify-center
                                        text-gray-600 text-lg">
                                📷 Photo à venir
                            </div>

                        @endif

                        <div class="absolute top-4 left-4
                                    rounded-full
                                    bg-lime-400
                                    px-3 py-1
                                    text-sm
                                    font-black
                                    text-black">
                            Gel Blaster
                        </div>

                    </div>

                    {{-- Informations --}}
                    <div class="p-6">

                        <h2 class="text-2xl font-black text-white">
                            {{ $replica->name }}
                        </h2>

                        @if($replica->description)

                            <p class="mt-3 text-gray-400 leading-relaxed">
                                {{ $replica->description }}
                            </p>

                        @endif

                        @if($replica->specifications)

                            <div class="mt-5 pt-5 border-t border-white/10">

                                <h3 class="text-sm font-black uppercase
                                           tracking-wider text-lime-400">
                                    Caractéristiques
                                </h3>

                                <p class="mt-2 text-gray-400 whitespace-pre-line">
                                    {{ $replica->specifications }}
                                </p>

                            </div>

                        @endif

                    </div>

                </article>

            @empty

                <div class="col-span-full text-center py-16">

                    <div class="text-5xl mb-5">
                        🔫
                    </div>

                    <h2 class="text-2xl font-black text-white">
                        Nos répliques arrivent bientôt
                    </h2>

                    <p class="mt-3 text-gray-400">
                        Notre arsenal sera bientôt présenté ici.
                    </p>

                </div>

            @endforelse

        </div>

        {{-- Information --}}
        <div class="mt-16 rounded-3xl
                    border border-lime-400/20
                    bg-lime-400/5
                    p-8 text-center">

            <h2 class="text-2xl font-black text-white">
                🎯 Tout le matériel est fourni
            </h2>

            <p class="mt-3 text-gray-400 max-w-2xl mx-auto">
                Pas besoin de venir avec votre propre équipement.
                Blaster44 fournit le matériel nécessaire pour participer
                à la session.
            </p>

        </div>

        {{-- CTA --}}
        <div class="text-center mt-16">

            <a href="/reserver"
               class="inline-block
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