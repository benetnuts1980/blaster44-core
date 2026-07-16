<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/reserver', [ReservationController::class, 'create']);
Route::post('/reserver', [ReservationController::class, 'store']);