<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Dashboard (Protected)
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});

// Redirect Home to Login
Route::get('/', function () {
    return redirect()->route('login');
});