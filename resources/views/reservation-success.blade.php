@extends('layouts.app')

@section('title', 'Mission enregistrée - Blaster44')

@section('content')

<section class="min-h-screen bg-[#0A0A0A] py-20">

    <div class="max-w-3xl mx-auto px-6">

        <div class="bg-[#111111] border border-lime-400/20 rounded-3xl p-10 text-center">

            <div class="text-7xl mb-6">
                ✅
            </div>

            <h1 class="text-5xl font-black text-white mb-4">
                Mission enregistrée
            </h1>

            <p class="text-gray-400 mb-10">
                Votre demande de réservation a bien été enregistrée.
            </p>

            <div class="bg-black rounded-2xl p-6 text-left space-y-3">

                <div class="text-white">
                    📅 <strong>Date :</strong>
                    {{ $reservation->reservation_date->format('d/m/Y') }}
                </div>

                <div class="text-white">
                    🕒 <strong>Heure :</strong>
                    {{ substr($reservation->start_time, 0, 5) }}
                </div>

                <div class="text-white">
                    🎯 <strong>Formule :</strong>
                    {{ $reservation->formula->name }}
                </div>

                <div class="text-white">
                    👥 <strong>Joueurs :</strong>
                    {{ $reservation->players_count }}
                </div>

                <div class="text-white">
                    📌 <strong>Statut :</strong>
                    En attente de confirmation
                </div>

            </div>

            <p class="text-gray-400 mt-8">
                📧 Un email de confirmation vient de vous être envoyé.
            </p>

            <div class="flex flex-wrap justify-center gap-4 mt-10">

                <a href="/"
                   class="bg-lime-400 text-black font-bold px-6 py-3 rounded-xl">
                    🏠 Accueil
                </a>

                <a href="/reserver"
                   class="border border-lime-400 text-lime-400 font-bold px-6 py-3 rounded-xl">
                    🔫 Nouvelle réservation
                </a>

            </div>

        </div>

    </div>

</section>

@endsection