@extends('layouts.app')

@section('title', 'Mission enregistrée - Blaster44')

@section('content')

<section class="min-h-screen bg-[#0A0A0A] pt-36 pb-20">

    <div class="max-w-3xl mx-auto px-6">

        <div class="bg-[#111111] border border-lime-400/20 rounded-3xl p-10">

            <div class="text-center">

                <div class="text-7xl mb-6">
                    ✅
                </div>

                <h1 class="text-5xl font-black text-white mb-4">
                    Mission enregistrée
                </h1>

                <p class="text-gray-400 mb-10">
                    Votre demande de réservation a bien été enregistrée.
                </p>

            </div>

            {{-- RÉSUMÉ DE LA RÉSERVATION --}}
            <div class="bg-black rounded-2xl p-6 space-y-3">

                <h2 class="text-xl font-bold text-white mb-5">
                    🎯 Résumé de votre réservation
                </h2>

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
                    💰 <strong>Total :</strong>
                    {{ number_format((float) $reservation->total_price, 2, ',', ' ') }} €
                </div>

                <div class="text-white">
                    💳 <strong>Paiement :</strong>

                    @if($reservation->payment_option === 'deposit_30')
                        Acompte de 30 %
                    @else
                        Paiement intégral
                    @endif
                </div>

                <div class="text-white">
                    📌 <strong>Statut :</strong>
                    En attente de confirmation
                </div>

            </div>


            {{-- PAIEMENT --}}
            <div class="mt-8 bg-lime-400/10 border border-lime-400/30 rounded-2xl p-6">

                <h2 class="text-2xl font-black text-white mb-4">
                    🏦 Paiement par virement bancaire
                </h2>

                <p class="text-gray-300 mb-6">
                    Afin de confirmer définitivement votre réservation,
                    veuillez effectuer le virement du montant indiqué ci-dessous.
                </p>


                {{-- MONTANT À PAYER --}}
                <div class="bg-black rounded-2xl p-6 mb-6">

                    <div class="text-gray-400 text-sm mb-2">
                        Montant à payer maintenant
                    </div>

                    <div class="text-4xl font-black text-lime-400">
                        {{ number_format((float) $reservation->deposit, 2, ',', ' ') }} €
                    </div>

                    @if($reservation->payment_option === 'deposit_30')

                        <div class="text-gray-400 mt-3">
                            Acompte de 30 % sur le montant total.
                        </div>

                        <div class="text-gray-300 mt-2">
                            Solde restant :
                            <strong class="text-white">
                                {{ number_format(
                                    max(0, (float) $reservation->total_price - (float) $reservation->deposit),
                                    2,
                                    ',',
                                    ' '
                                ) }} €
                            </strong>
                        </div>

                    @else

                        <div class="text-gray-400 mt-3">
                            Paiement intégral de votre réservation.
                        </div>

                    @endif

                </div>


                {{-- COORDONNÉES BANCAIRES --}}
                <div class="space-y-4">

                    <div>
                        <div class="text-gray-400 text-sm">
                            Titulaire du compte
                        </div>

                        <div class="text-white font-bold">
                            Julien Maton
                        </div>
                    </div>

                    <div>
                        <div class="text-gray-400 text-sm">
                            IBAN
                        </div>

                        <div class="text-white font-bold">
                            BE25 3632 7909 2682
                        </div>
                    </div>

                    <div>
                        <div class="text-gray-400 text-sm">
                            BIC
                        </div>

                        <div class="text-white font-bold">
                            BBRUBEBB
                        </div>
                    </div>

                    <div>
                        <div class="text-gray-400 text-sm">
                            Communication
                        </div>

                        <div class="text-lime-400 font-black text-xl">
                            B44-{{ str_pad($reservation->id, 6, '0', STR_PAD_LEFT) }}
                        </div>
                    </div>

                </div>

                <div class="mt-6 p-4 bg-black/50 rounded-xl text-sm text-gray-400">
                    ⚠️ Utilisez impérativement cette communication lors du virement
                    afin que nous puissions identifier votre paiement.
                </div>

            </div>


            {{-- INFORMATION CONFIRMATION --}}
            <div class="mt-8 text-center">

                <p class="text-gray-400">
                    Votre réservation sera définitivement confirmée
                    après vérification de la réception du paiement.
                </p>

                <p class="text-gray-500 text-sm mt-3">
                    📧 Les instructions de paiement vous ont également été envoyées
                    par email.
                </p>

            </div>


            {{-- BOUTONS --}}
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
