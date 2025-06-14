<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', [NavigationController::class, 'home'])->name('home');

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

// FAQ
Route::get('faq', function() { })
    ->name('faq');

// TODO: Change empty function() into the appropriate function/controller

// Articles
Route::prefix('articles')->group(function() {
    Route::get('/', [ArticleController::class, 'index'])->name('articles');
    Route::get('/article-search', [ArticleController::class, 'search'])->name('articles.search');
    Route::get('/{id}', [ArticleController::class, 'articleDetail'])->name('articles.detail');
});

// Green Act
Route::prefix('green-act')->group(function() {
    Route::get('/', [ActivityController::class, 'index'])->name('social-activities');
    Route::get('/activity-search', [ActivityController::class, 'search'])->name('social-activities.search');
    Route::get('/{id}', [ActivityController::class, 'socialActivityDetail'])->name('social-activities.detail');
});

// Tree Fund
Route::prefix('tree-fund')->group(function() {
    Route::get('/', [NavigationController::class, 'donate'])
        ->name("tree-fund");
});

// Membership
Route::prefix('membership')->group(function () {
    Route::get('/', function () {
        return view('membership.membership');
    })->name('membership');
    Route::get('/verify-payment', function () {
        return view('membership.verify-payment');
    })->name('verify.payment');
    Route::get('/email', function () {
        return view('membership.email');
    })->name('email');
    Route::get('/success', function () {
        return view('membership.congratulations');
    })->name('membership.success');
});

Route::middleware(['auth'])->group(function() {
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
        Route::get('/', [VoucherController::class, 'vouchers'])
            ->name('vouchers');
        Route::post('/redeem', [VoucherController::class, 'redeem'])
            ->name('voucher-redeem-post');
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
        Route::get('/', [ChallengeController::class, "getChallenges"])
            ->name('challenge');

        Route::get('/start/{id}', [ChallengeController::class, "startChallengePage"])
            ->name('start-challenge');
        Route::get('/approvals', [ChallengeController::class, "getChallengeStatus"])
            ->name('challenge-approval');
        Route::post('/start', [ChallengeController::class, "submitChallenge"])
            ->name('submit-challenge');

        Route::get('/{id}', [ChallengeController::class, "getChallengeDetail"])
            ->name('challenge-detail');
    });

    //Profile
    Route::prefix('profile')->group(function() {
        Route::get('/faqs', function() {
            return view('faqs.faqs');})->name('faqs');
        Route::get('/edit', function() {
            return view('profile.edit-profile');})->name('edit.profile');
    });
});



Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
