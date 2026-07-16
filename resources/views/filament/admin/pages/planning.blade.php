<x-filament-panels::page>

    @php
        $reservations = \App\Models\Reservation::with(['formula', 'terrain'])
            ->orderBy('reservation_date')
            ->orderBy('start_time')
            ->get();
    @endphp

    <div class="space-y-4">

        @forelse($reservations as $reservation)

            <div class="rounded-xl border p-4 bg-white dark:bg-gray-900">

                <div class="font-bold text-lg">
                    {{ $reservation->reservation_date->format('d/m/Y') }}
                </div>

                <div>
                    🕒 {{ \Carbon\Carbon::parse($reservation->start_time)->format('H:i') }} → {{ $reservation->end_time }}
                </div>

                <div>
                    👤 {{ $reservation->customer_name }}
                </div>

                <div>
                    🎯 {{ $reservation->formula?->name }}
                </div>

                <div>
                    📍 {{ $reservation->terrain?->name }}
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

                <div>
                    👥 {{ $reservation->players_count }} joueurs
                </div>

            </div>

        @empty

            <div class="rounded-xl border p-4">
                Aucune réservation trouvée.
            </div>

        @endforelse

    </div>

</x-filament-panels::page>