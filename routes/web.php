<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('/auth/login', function () {
    return view('login');
});

Route::get('/auth/register', function () {
    return view('register');
});

// Public routes
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');

// Protected routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Properties (RESTful)
    Route::resource('properties', PropertyController::class);
    Route::post('/properties/{property}/increment-views', [PropertyController::class, 'incrementViews'])->name('properties.increment-views');
    Route::post('/properties/{property}/increment-inquiries', [PropertyController::class, 'incrementInquiries'])->name('properties.increment-inquiries');

    // Transactions (RESTful)
    Route::resource('transactions', TransactionController::class);

    // Customers (RESTful)
    Route::resource('customers', CustomerController::class);

    // Messages (RESTful)
    Route::resource('messages', MessageController::class);

    // Reports
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('properties.show');
