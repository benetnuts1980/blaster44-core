<?php

use Illuminate\Support\Facades\Route;
use App\Models\Formula;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Site public
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home', [
        'formulas' => Formula::where('active', true)->get(),
    ]);
});

Route::get('/reserver', [ReservationController::class, 'create']);
Route::post('/reserver', [ReservationController::class, 'store']);

Route::get(
    '/reservation/{reservation}/success',
    [ReservationController::class, 'success']
)->name('reservation.success');

Route::get(
    '/creneaux-disponibles',
    [ReservationController::class, 'availableSlots']
);

/*
|--------------------------------------------------------------------------
| Espace joueur
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Auth Breeze
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
