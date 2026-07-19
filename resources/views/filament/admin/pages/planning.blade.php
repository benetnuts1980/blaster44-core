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

            <div style="border:1px solid #ddd;padding:20px;border-radius:12px;">

                <h2 style="font-size:28px;font-weight:bold;margin-bottom:20px;">
                    📅 {{ $date }}
                </h2>
                @php
    $dayPlayers = $dayReservations->sum('players_count');
    $dayRevenue = $dayReservations->sum('total_price');
    $dayCount = $dayReservations->count();
@endphp

<div style="
    display:flex;
    gap:20px;
    margin-bottom:20px;
    font-weight:bold;
">
    <span>🎯 {{ $dayCount }} réservation(s)</span>
    <span>👥 {{ $dayPlayers }} joueur(s)</span>
    <span>💰 {{ number_format($dayRevenue, 2, ',', ' ') }} €</span>
</div>

                <div style="display:flex;flex-direction:column;gap:15px;">

                    @foreach($dayReservations as $reservation)

                        <div style="border:1px solid #ddd;padding:15px;border-radius:10px;background:#fafafa;">

                            <div style="display:flex;justify-content:space-between;align-items:flex-start;">

                                <div>

                                    <div style="font-size:18px;font-weight:bold;">
                                        🕒 {{ \Carbon\Carbon::parse($reservation->start_time)->format('H:i') }}
                                        → {{ $reservation->end_time }}
                                    </div>

                                    <div style="margin-top:8px;">
                                        👤 <strong>{{ $reservation->customer_name }}</strong>
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

                                </div>

                                <div>

                                    @if($reservation->status === 'pending')

                                        <span style="background:#facc15;color:#000;padding:6px 12px;border-radius:999px;font-weight:bold;">
                                            En attente
                                        </span>

                                    @elseif($reservation->status === 'confirmed')

                                        <span style="background:#22c55e;color:white;padding:6px 12px;border-radius:999px;font-weight:bold;">
                                            Confirmée
                                        </span>

                                    @elseif($reservation->status === 'completed')

                                        <span style="background:#3b82f6;color:white;padding:6px 12px;border-radius:999px;font-weight:bold;">
                                            Terminée
                                        </span>

                                    @elseif($reservation->status === 'cancelled')

                                        <span style="background:#ef4444;color:white;padding:6px 12px;border-radius:999px;font-weight:bold;">
                                            Annulée
                                        </span>

                                    @endif

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        @empty

            <div style="padding:20px;border:1px solid #ddd;border-radius:12px;">
                Aucune réservation trouvée.
            </div>

        @endforelse

    </div>

</x-filament-panels::page>