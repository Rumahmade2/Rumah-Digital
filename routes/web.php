<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOrdersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\WishlistController;

// ─── PUBLIC ROUTES ─────────────────────────────────────────────────────────────
Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/details/{product:slug}', [FrontController::class, 'details'])->name('front.details');
Route::get('/category/{category:slug}', [FrontController::class, 'category'])->name('front.category');
Route::get('/search', [FrontController::class, 'search'])->name('front.search');
Route::get('/live-search', [FrontController::class, 'liveSearch'])->name('front.live_search');
Route::get('/creator/{user}', [FrontController::class, 'creator'])->name('front.creator');

Route::get('/stories', [FrontController::class, 'stories'])->name('front.stories');
Route::get('/benefits', [FrontController::class, 'benefits'])->name('front.benefits');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');


// ─── AUTHENTICATED ROUTES ──────────────────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/checkout/{product:slug}', [CheckoutController::class, 'checkout'])->name('front.checkout');

    Route::get('/product-orders', [ProductOrdersController::class, 'index'])->name('product-orders.index');
    Route::get('/my-orders', [ProductOrdersController::class, 'myOrders'])->name('front.my_orders');

    Route::post('/product/{product}/review', [ProductReviewController::class, 'store'])->name('front.product_review.store');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('front.wishlist');
    Route::post('/wishlist/toggle/{product}', [WishlistController::class, 'toggle'])->name('front.wishlist.toggle');

    // PDF Routes
    Route::get('/product-orders/export-pdf', [ProductOrdersController::class, 'export_pdf'])->name('product-orders.export_pdf');
    Route::get('/product-orders/invoice/{product_orders}', [ProductOrdersController::class, 'download_invoice'])->name('product-orders.download_invoice');
});


// ─── ADMIN ROUTES (dilindungi middleware auth) ─────────────────────────────────
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Product Management
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Order Management
    Route::get('product_orders', [ProductOrdersController::class, 'index'])->name('product_orders.index');
    Route::get('product_orders/export-pdf', [ProductOrdersController::class, 'export_sales_pdf'])->name('product_orders.export_pdf');
    Route::get('product_orders/details/{product_orders}', [ProductOrdersController::class, 'show'])->name('product_orders.show');
    Route::get('product_orders/transaction', [ProductOrdersController::class, 'transaction'])->name('product_orders.transaction');

    // Reviews
    Route::get('product_reviews', [ProductReviewController::class, 'index'])->name('product_reviews.index');
    Route::delete('product_reviews/{productReview}', [ProductReviewController::class, 'destroy'])->name('product_reviews.destroy');

    // Categories
    Route::resource('categories', CategoryController::class)->except(['show'])->names('categories');

    // Transaction Actions
    Route::get('/transaction/detail/{product_orders}', [ProductOrdersController::class, 'transaction_details'])->name('product_orders.transaction.detail');
    Route::patch('/transaction/approve/{product_orders}', [ProductOrdersController::class, 'approve'])->name('product_orders.approve');
    Route::delete('/product_orders/{product_orders}', [ProductOrdersController::class, 'destroy'])->name('product_orders.destroy');
    Route::get('/transaction/download/{product_orders}', [ProductOrdersController::class, 'download'])->name('product_orders.download')->middleware('throttle:1,1');
});


require __DIR__ . '/auth.php';
