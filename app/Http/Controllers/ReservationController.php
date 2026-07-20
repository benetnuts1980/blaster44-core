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
            'terrains' => Terrain::where('is_active', true)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_name' => ['required'],
            'customer_phone' => ['required'],
            'customer_email' => ['nullable', 'email'],
            'formula_id' => ['required', 'exists:formulas,id'],
            'terrain_id' => ['required', 'exists:terrains,id'],
            'reservation_date' => ['required', 'date', 'after_or_equal:today'],
            'start_time' => ['required'],
            'players_count' => ['required', 'integer', 'min:1', 'max:12'],
        ]);

        $formula = Formula::findOrFail($data['formula_id']);

        if (Reservation::hasConflict(
            terrainId: (int) $data['terrain_id'],
            date: $data['reservation_date'],
            startTime: $data['start_time'],
            durationMinutes: $formula->duration,
        )) {
            return back()
                ->withInput()
                ->with('error', 'Le terrain est déjà réservé sur ce créneau.');
        }

       $reservation = Reservation::create([
    ...$data,
    'total_price' => $formula->price,
    'deposit' => 0,
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
    $terrainId = $request->terrain_id;
    $date = $request->date;

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

    $reservations = Reservation::where('terrain_id', $terrainId)
        ->whereDate('reservation_date', $date)
        ->pluck('start_time')
        ->map(fn ($time) => substr($time, 0, 5))
        ->toArray();

    return response()->json([
        'reserved' => $reservations,
        'available' => array_values(array_diff($hours, $reservations)),
    ]);
}
public function success(Reservation $reservation)
{
    $reservation->load(['formula', 'terrain']);

    return view('reservation-success', [
        'reservation' => $reservation,
    ]);
}
}