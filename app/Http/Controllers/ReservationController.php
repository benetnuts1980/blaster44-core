<?php

namespace App\Http\Controllers;

use App\Models\Formula;
use App\Models\Reservation;
use App\Models\Terrain;
use Illuminate\Http\Request;
use App\Mail\ReservationAdminMail;
use App\Mail\ReservationClientMail;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
public function create()
{
    return view('reservation', [
        'formulas' => Formula::where('active', true)->get(),
    ]);
}

public function store(Request $request)
{
    $data = $request->validate([
        'customer_name' => ['nullable'],
        'customer_phone' => ['nullable'],
        'customer_email' => ['nullable', 'email'],
        'formula_id' => ['required', 'exists:formulas,id'],
        'reservation_date' => ['required', 'date', 'after_or_equal:today'],
        'start_time' => ['required'],
        'players_count' => ['required', 'integer', 'min:4', 'max:20'],
        'payment_option' => ['required', 'in:deposit_30,full'],
    ]);

    if (auth()->check()) {

        $data['customer_name'] = auth()->user()->name;
        $data['customer_phone'] = auth()->user()->phone;
        $data['customer_email'] = auth()->user()->email;

    } else {

        if (
            empty($data['customer_name']) ||
            empty($data['customer_phone'])
        ) {
            return back()
                ->withInput()
                ->with('error', 'Nom et téléphone obligatoires.');
        }
    }

    $formula = Formula::findOrFail($data['formula_id']);

    $totalPrice = (float) $formula->price;

    $unitPrice = (float) $formula->price;

    $totalPrice = round(
        $unitPrice * $data['players_count'],
        2
    );

    $paymentAmount = $data['payment_option'] === 'deposit_30'
        ? round($totalPrice * 0.30, 2)
        : $totalPrice;

    /*
     * Le client ne choisit plus le terrain.
     * On cherche automatiquement le premier terrain actif
     * disponible pour la date, l'heure et la durée demandées.
     */
    $availableTerrain = Terrain::where('is_active', true)
        ->get()
        ->first(function ($terrain) use ($data, $formula) {

            return ! Reservation::hasConflict(
                terrainId: $terrain->id,
                date: $data['reservation_date'],
                startTime: $data['start_time'],
                durationMinutes: $formula->duration,
            );
        });

    if (! $availableTerrain) {
        return back()
            ->withInput()
            ->with('error', 'Tous nos terrains sont déjà réservés sur ce créneau. Merci de choisir une autre heure.');
    }

    $data['terrain_id'] = $availableTerrain->id;

    $reservation = Reservation::create([
        ...$data,
        'user_id' => auth()->id(),

        'total_price' => $totalPrice,

        // Montant demandé maintenant
        'deposit' => $paymentAmount,

        // Paiement actuellement disponible
        'payment_method' => 'bank_transfer',

        // deposit_30 ou full
        'payment_option' => $data['payment_option'],

        // Aucun paiement encore vérifié
        'amount_paid' => 0,
        'paid_at' => null,
        'payment_status' => 'pending',

        'status' => 'pending',
]);

    $reservation->load(['formula', 'terrain']);

    if ($reservation->customer_email) {
        Mail::to($reservation->customer_email)
            ->send(new ReservationClientMail($reservation));
    }

    Mail::to('sergentblaster44@gmail.com')
        ->send(new ReservationAdminMail($reservation));

    return redirect()->route(
        'reservation.success',
        $reservation
    );

    }
public function availableSlots(Request $request)
{
    $data = $request->validate([
        'formula_id' => ['required', 'exists:formulas,id'],
        'date' => ['required', 'date'],
    ]);

    $formula = Formula::findOrFail($data['formula_id']);

    $hours = [
        '09:00',
        '10:00',
        '11:00',
        '12:00',
        '13:00',
        '14:00',
        '15:00',
        '16:00',
        '17:00',
        '18:00',
    ];

    $terrains = Terrain::where('is_active', true)->get();

    $available = [];

    foreach ($hours as $hour) {

        $terrainAvailable = $terrains->contains(function ($terrain) use ($data, $hour, $formula) {

            return ! Reservation::hasConflict(
                terrainId: $terrain->id,
                date: $data['date'],
                startTime: $hour,
                durationMinutes: $formula->duration,
            );
        });

        if ($terrainAvailable) {
            $available[] = $hour;
        }
    }

    return response()->json([
        'available' => $available,
    ]);

}
public function success(Reservation $reservation)
{
    $reservation->load(['formula', 'terrain']);

    return view('reservation-success', [
        'reservation' => $reservation,
    ]);
}
public function cancel(Reservation $reservation)
{
    if (! auth()->check()) {
        abort(403);
    }

    if ($reservation->user_id !== auth()->id()) {
        abort(403);
    }

    $reservationDateTime = Carbon::parse(
        $reservation->reservation_date->format('Y-m-d')
        . ' '
        . $reservation->start_time
    );

    if (now()->greaterThanOrEqualTo(
        $reservationDateTime->copy()->subHours(48)
    )) {
        return back()->with(
            'error',
            'Cette réservation ne peut plus être annulée en ligne moins de 48h avant la partie.'
        );
    }

    $reservation->update([
        'status' => 'cancelled',
    ]);

    return back()->with(
        'success',
        'Réservation annulée avec succès.'
    );
}
}