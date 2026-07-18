<?php

namespace App\Http\Controllers;

use App\Models\Formula;
use App\Models\Reservation;
use App\Models\Terrain;
use Illuminate\Http\Request;

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

        Reservation::create([
            ...$data,
            'total_price' => $formula->price,
            'deposit' => 0,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Réservation enregistrée avec succès.');
    }
}