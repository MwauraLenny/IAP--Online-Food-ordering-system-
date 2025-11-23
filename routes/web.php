<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware(['auth', 'active'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');

    Route::middleware('role:customer')->prefix('customer')->name('customer.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'customerDashboard'])->name('dashboard');
        Route::get('/restaurants', function() { return view('customer.restaurants'); })->name('restaurants');
        Route::get('/orders', function() { return view('customer.orders'); })->name('orders');
    });

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

