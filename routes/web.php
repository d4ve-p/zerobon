<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
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
        Route::get('/', [CartController::class, 'checkOutPage'])
            ->name('checkout');
        Route::post('/', [CartController::class, 'checkoutCart'])
            ->name('checkout-post');
        Route::post('/purchase', [PurchaseController::class, 'makePurchase'])
            ->name('checkout.purchase');
    });

    // Carts
    Route::prefix('carts')->group(function() {
        Route::get('/', [CartController::class, 'cartPage'])
        ->name('carts');
        
        Route::post('/', [CartController::class, 'finalizeCheckout'])
        ->name('finalize-checkout');

        Route::post('/add', [CartController::class, 'addToCart'])
        ->name('cart.add');

        Route::post('/delete', [CartController::class, 'removeItemFromCart'])
        ->name('cart.delete');

        Route::post('/update', [CartController::class, 'editCartItem'])
        ->name('cart.update');
    });

    // Purchases
    Route::prefix('purchases')->group(function() {
        Route::get('/', [PurchaseController::class, 'getAllPurchase'])
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
