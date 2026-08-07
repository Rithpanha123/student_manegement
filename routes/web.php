<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

// Login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Dashboard (Protected)
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Users (Admin)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('users', UserController::class);
    });


    // Students
    Route::view('/students', 'students.index')->name('students');

    // Classes
    Route::view('/classes', 'classes.index')->name('classes');

    // Staffs
    Route::view('/staffs', 'staffs.index')->name('staffs');

    // Invoices
    Route::view('/invoices', 'invoices.index')->name('invoices');

    // Bills
    Route::view('/bills', 'bills.index')->name('bills');

    // Transport
    Route::view('/transport', 'transport.index')->name('transport');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});

// Redirect Home to Login
Route::redirect('/', '/login');