<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\FeaturedContentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('home');

// DEBUG ROUTE: Remove after testing
Route::get('/debug-hero', function() {
    $allImages = \App\Models\WelcomeImage::where('type', 'hero')->get();
    $firstImage = $allImages->first();

    return response()->json([
        'total_hero_records' => $allImages->count(),
        'records' => $allImages->map(fn($img) => [
            'id' => $img->id,
            'type' => $img->type,
            'image_path' => $img->image_path,
            'is_published' => $img->is_published,
            'scheduled_publish_at' => $img->scheduled_publish_at?->toDateTimeString(),
            'created_at' => $img->created_at?->toDateTimeString(),
            'file_exists' => file_exists(public_path('storage/' . $img->image_path)),
            'asset_url' => asset('storage/' . $img->image_path),
        ])->all(),
    ]);
});

Route::get('/premium-developments', [WelcomeController::class, 'premiumDevelopments'])->name('premium-developments');

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
    // inquiry route: create message when customer inquires
    Route::post('/properties/{property}/inquire', [PropertyController::class, 'inquire'])->name('properties.inquire');

    // Featured Content Manager (now handles welcome images directly)
    Route::get('/manage-welcome', [FeaturedContentController::class, 'index'])->name('featured.index');

    // welcome page image CRUD
    Route::post('/welcome-images', [\App\Http\Controllers\WelcomeImageController::class, 'store'])->name('welcome-images.store');
    Route::patch('/welcome-images/{welcomeImage}', [\App\Http\Controllers\WelcomeImageController::class, 'update'])->name('welcome-images.update');
    Route::delete('/welcome-images/{welcomeImage}', [\App\Http\Controllers\WelcomeImageController::class, 'destroy'])->name('welcome-images.destroy');
    Route::patch('/welcome-images/{welcomeImage}/move', [\App\Http\Controllers\WelcomeImageController::class, 'move'])->name('welcome-images.move');
    Route::post('/welcome-images/reorder', [\App\Http\Controllers\WelcomeImageController::class, 'reorder'])->name('welcome-images.reorder');


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

// public inquiry endpoint (accessible without login)
Route::post('/inquiries', [PropertyController::class, 'publicInquire'])->name('inquiries.store');

require __DIR__.'/auth.php';

Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('properties.show');
