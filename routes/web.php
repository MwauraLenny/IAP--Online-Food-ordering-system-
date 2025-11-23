<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;

// Default welcome page
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

// Guest routes (login/register)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Authenticated routes
Route::middleware(['auth', 'active'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');

    // Customer routes
    Route::middleware('role:customer')->prefix('customer')->name('customer.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'customerDashboard'])->name('dashboard');
        Route::get('/restaurants', function() { return view('customer.restaurants'); })->name('restaurants');
        Route::get('/orders', function() { return view('customer.orders'); })->name('orders');
    });

    // Vendor routes
    Route::middleware('role:vendor')->prefix('vendor')->name('vendor.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'vendorDashboard'])->name('dashboard');
        Route::get('/menu', function() { return view('vendor.menu'); })->name('menu');
        Route::get('/orders', function() { return view('vendor.orders'); })->name('orders');
        Route::get('/settings', function () {
            return view('vendor.settings', [
                'user' => auth()->user(),
                'vendorProfile' => auth()->user()->vendorProfile,
                'cuisineTypes' => \App\Models\VendorProfile::cuisineTypes(),
            ]);
        })->name('settings');
    });
});

// --------------------
// MENU & STOCK API
// --------------------
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('foods', [FoodController::class, 'index'])->name('foods.index');
    Route::get('foods/create', [FoodController::class, 'create'])->name('foods.create');
    Route::post('foods', [FoodController::class, 'store'])->name('foods.store');
    Route::get('foods/{id}/edit', [FoodController::class, 'edit'])->name('foods.edit');
    Route::post('foods/{id}', [FoodController::class, 'update'])->name('foods.update');
    Route::delete('foods/{id}', [FoodController::class, 'destroy'])->name('foods.destroy');
    Route::post('foods/{id}/stock', [FoodController::class, 'updateStock'])->name('foods.updateStock');
});

// --------------------
// CUSTOMER ORDERING SYSTEM
// --------------------
Route::middleware(['auth', 'customer'])->group(function () {
    // Cart routes
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{foodId}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{foodId}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{foodId}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');

    // Checkout routes
    Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/place', [App\Http\Controllers\CheckoutController::class, 'placeOrder'])->name('checkout.place');

    // Order history
    Route::get('/my-orders', [App\Http\Controllers\OrderController::class, 'myOrders'])->name('orders.my');
});
