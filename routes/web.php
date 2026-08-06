<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Dashboard (Protected)
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::view('/dashboard', 'dashboard.index')->name('dashboard');

    // Students
     Route::view('/students', 'students.index')->name('students');

    // Route::get('/students/transfer', [StudentTransferController::class, 'create'])
    //     ->name('students.transfer');

    // Route::post('/students/transfer', [StudentTransferController::class, 'store'])
    //     ->name('students.transfer.store');

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