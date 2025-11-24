<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/

// Customer Dashboard
Route::get('/customer/dashboard', function () {
    return view('customer.dashboard');
})->name('customer.dashboard');

// Checkout page
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

// Process payment
Route::post('/checkout/pay', [CheckoutController::class, 'pay'])->name('checkout.pay');

/*
|--------------------------------------------------------------------------
| Vendor Routes
|--------------------------------------------------------------------------
*/

// Vendor Dashboard
Route::get('/vendor/dashboard', function () {
    return view('vendor.dashboard');
})->name('vendor.dashboard');
