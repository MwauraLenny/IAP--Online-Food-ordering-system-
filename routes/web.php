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
