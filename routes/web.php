<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\User\BandcampArtistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', fn () => view('dashboard'))->name('dashboard');
    Route::get('/artist', [BandcampArtistController::class, 'show'])->name('dashboard.artist');
    Route::get('/tracks',        [TrackController::class, 'index'])->name('dashboard.tracks.index');  // ← NEW
    Route::get('/tracks/create', [TrackController::class, 'create'])->name('dashboard.tracks.create');
    Route::post('/tracks',       [TrackController::class, 'store'])->name('dashboard.tracks.store');
});

// routes/web.php — public, outside the dashboard group
Route::get('/tracks', [TrackController::class, 'index'])->name('tracks.index');
Route::get('/tracks/{track}', [TrackController::class, 'show'])->name('tracks.show');

// Public
Route::get('/tracks/{track}', [TrackController::class, 'show'])->name('tracks.show');
require __DIR__.'/auth.php';
