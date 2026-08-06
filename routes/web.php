<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Dashboard (Protected)
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::view('/dashboard', 'dashboard.index')->name('dashboard');

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

//Admin Route
Route::prefix('admin')->name('admin.')->group(function () {
    // User Management
    Route::get('/user_list', [AdminController::class, 'users'])->name('user_list');
    // Route::get('/create', [AdminController::class, 'create'])->name('create');
    // Route::post('/store', [AdminController::class, 'store'])->name('store');
    // Route::get('/user/{user_id}/edit', [AdminController::class, 'edit'])->name('edit_user');
    // Route::put('/user/{user_id}', [AdminController::class, 'update'])->name('update_user');
    // Route::delete('/user/{user_id}', [AdminController::class, 'destroy'])->name('delete_user');
});

