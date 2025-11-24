<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
| Customer Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/customer/dashboard', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    return view('customer.dashboard');
})->name('customer.dashboard');

/*
|--------------------------------------------------------------------------
| Checkout
|--------------------------------------------------------------------------
*/
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/pay', [CheckoutController::class, 'pay'])->name('checkout.pay');

/*
|--------------------------------------------------------------------------
| Vendor Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/vendor/dashboard', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    return view('vendor.dashboard');
})->name('vendor.dashboard');
