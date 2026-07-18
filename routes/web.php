<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Models\Formula;

Route::get('/', function () {
    return view('home', [
        'formulas' => Formula::where('active', true)->get(),
    ]);
});

Route::get('/reserver', [ReservationController::class, 'create']);
Route::post('/reserver', [ReservationController::class, 'store']);