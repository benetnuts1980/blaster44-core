<?php

use Illuminate\Support\Facades\Route;
use App\Models\Formula;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Models\User;
use App\Models\Checkin;

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
    
    Route::post(
    '/reservation/{reservation}/cancel',
    [ReservationController::class, 'cancel']
)->name('reservation.cancel');
});

/*
|--------------------------------------------------------------------------
| Auth Breeze
|--------------------------------------------------------------------------
*/
Route::get('/ranking', function () {
    return view('ranking');
})->name('ranking');


Route::get('/checkin/{token}', function ($token) {

    $user = User::where('qr_token', $token)->firstOrFail();

    $alreadyCheckedToday = Checkin::where('user_id', $user->id)
        ->whereDate('created_at', today())
        ->exists();

    if (! $alreadyCheckedToday) {

        Checkin::create([
            'user_id' => $user->id,
            'points_awarded' => 10,
        ]);

        $user->increment('points', 10);
        $user->increment('games_played');
    }

    return view('checkin', [
        'user' => $user->fresh(),
        'alreadyCheckedToday' => $alreadyCheckedToday,
    ]);
    
});
Route::view('/anniversaire', 'anniversaire')
    ->name('anniversaire');
    Route::view('/team-building', 'team-building')
    ->name('team-building');
    Route::view('/terrains', 'terrains')
    ->name('terrains');
    Route::view('/faq', 'faq')
    ->name('faq');
require __DIR__.'/auth.php';
