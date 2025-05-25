<?php

use App\Http\Controllers\DonationController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Products
Route::get('products', [ProductController::class, 'products'])
    ->name('products');
Route::view('products/create', 'products.create-product')
    ->name('create-product');
Route::get('products/edit/{id}', function ($id) {
        return view('products.edit-product', ['productId' => $id]);
    })->name('edit-product');
Route::get('products/delete/{id}', [ProductController::class, 'delete'])
    ->name('delete-product');

// TODO: Change empty function() into the appropriate function/controller

// Articles
Route::prefix('articles')->group(function() {
    Route::get('/', function() { })
        ->name('articles');
    Route::get('/{id}', function() {  })
        ->name('articles-detail'); 
});

// Social Activities
Route::prefix('social-activities')->group(function() {
    Route::get('/', function() { })
        ->name('social-activities');
});



Route::middleware(['auth'])->group(function() {
    // Order
    Route::prefix('order')->group(function() {
        Route::view('/', function() { })
            ->name('order');
    });

    // Checkout
    Route::prefix('checkout')->group(function() {
        Route::view('/', function() { })
            ->name('checkout');
    });

    // Carts
    Route::prefix('carts')->group(function() {
        Route::view('/', 'carts.cart')
        ->name('carts');
    });

    // Purchases
    Route::prefix('purchases')->group(function() {
        Route::view('/', function() { })
            ->name('purchases');
        Route::get('/{id}', function() {})
            ->name('purchase-detail');
    });

    // Forums
    Route::prefix('forum')->group(function() {
        Route::get('/', function() { })
            ->name('forum'); // Controller will handle searches and normal forum here
        Route::view('/create', function() { })
            ->name('forum-create');
        Route::post('create', function() {})
            ->name('forum-create-post');
        Route::post('/reply', function() {})
            ->name('forum-reply-post');
    });

    // Vouchers
    Route::prefix('vouchers')->group(function() {
        Route::get('/', function() { })
            ->name('vouchers');
        Route::post('/use', function() { })
            ->name('vouchers-use-post');
    });

    // Carbon Footprint
    Route::prefix('carbon-foorprints')->group(function() {
        Route::get('/', function() {})
            ->name('carbon-footprint');
    });

    // Donation
    Route::prefix('donation')->group(function() {
        Route::get('/', [ DonationController::class, 'donations' ])
            ->name('donate');
        Route::post('/', [ DonationController::class, 'donate' ])
            ->name('donate-post');
    });

    // Reward
    Route::prefix('reward')->group(function() {
        Route::get('/', function() { })
            ->name('reward');
        Route::post('/use', function() { })
            ->name('reward-user-post');
    });

    // Challenge
    Route::prefix('challenge')->group(function() {
        Route::get('/', function() { })
            ->name('challenge');
        Route::get('/{id}', function() { })
            ->name('challenge-detail');
        Route::get('/start/{id}', function() { })
            ->name('start-challenge');
        Route::post('/start/{id}', function() { })
            ->name('submit-challenge');
    });
});



Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
