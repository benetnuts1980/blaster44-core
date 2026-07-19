<?php

use Illuminate\Support\Facades\Route;
use App\Models\Formula;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('home', [
        'formulas' => Formula::where('active', true)->get(),
    ]);
});

Route::get('/reserver', [ReservationController::class, 'create']);
Route::post('/reserver', [ReservationController::class, 'store']);
Route::get('/creneaux-disponibles', [ReservationController::class, 'availableSlots']);