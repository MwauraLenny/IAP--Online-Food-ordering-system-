<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;

// Default welcome page
Route::get('/', function () {
    return view('welcome');
});


// --------------------
// MENU & STOCK API
// --------------------
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('foods', [FoodController::class, 'index'])->name('foods.index');          // food_management.blade.php
    Route::get('foods/create', [FoodController::class, 'create'])->name('foods.create');  // food_create.blade.php
    Route::post('foods', [FoodController::class, 'store'])->name('foods.store');          // save new food
    Route::get('foods/{id}/edit', [FoodController::class, 'edit'])->name('foods.edit');   // food_edit.blade.php
    Route::post('foods/{id}', [FoodController::class, 'update'])->name('foods.update');   // update food
    Route::delete('foods/{id}', [FoodController::class, 'destroy'])->name('foods.destroy');// delete food
    Route::post('foods/{id}/stock', [FoodController::class, 'updateStock'])->name('foods.updateStock'); // stock_management.blade.php
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
