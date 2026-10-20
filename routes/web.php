<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;              // ← add this line
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\DashboardController;

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

// Homepage, TO DO
Route::get('/', function () {
    return view('welcome',   [
        'users' => User::all(),
    ]);
});

// GET login page, default view for login
Route::get('/login',  [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
    
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');


// GET forgot password page, default view
Route::get('/forgot-password',  [LoginController::class, 'forgotPassword'])->name('forgotPassword');

// POST forgot password page, action method
Route::post('/forgot-password', [LoginController::class, 'commitNewPassword'])->name('commitNewPassword');
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'name'     => ['required', 'string', 'max:255'],
        'email'    => ['required', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    User::create([
        'name'     => $validated['name'],
        'email'    => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

    return redirect('/')->with('success', 'Registration successful!');
})->name('register.store');

