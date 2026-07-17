<x-filament-panels::page>

    @php
        $reservations = \App\Models\Reservation::with(['formula', 'terrain'])
            ->orderBy('reservation_date')
            ->orderBy('start_time')
            ->get()
            ->groupBy(fn ($reservation) => $reservation->reservation_date->format('d/m/Y'));
    @endphp

    <div class="space-y-8">

        @forelse($reservations as $date => $dayReservations)

            <div class="rounded-xl border p-6">

                <h2 class="text-2xl font-bold mb-4">
                    📅 {{ $date }}
                </h2>

                <div class="space-y-3">

                    @foreach($dayReservations as $reservation)

                        <div class="rounded-lg border p-4">

                            <div class="font-semibold">
                                🕒 {{ \Carbon\Carbon::parse($reservation->start_time)->format('H:i') }}
                                → {{ $reservation->end_time }}
                            </div>

                            <div>
                                👤 {{ $reservation->customer_name }}
                            </div>

                            <div>
                                🎯 {{ $reservation->formula?->name }}
                            </div>

                            <div>
                                🏟️ {{ $reservation->terrain?->name }}
                            </div>

                            <div>
                                👥 {{ $reservation->players_count }} joueurs
                            </div>

                            <div>
                                @switch($reservation->status)
                                    @case('pending')
                                        🟡 En attente
                                        @break

                                    @case('confirmed')
                                        🟢 Confirmée
                                        @break

                                    @case('completed')
                                        🔵 Terminée
                                        @break

                                    @case('cancelled')
                                        🔴 Annulée
                                        @break
                                @endswitch
                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        @empty

            <div class="rounded-xl border p-4">
                Aucune réservation trouvée.
            </div>

        @endforelse

    </div>

</x-filament-panels::page>