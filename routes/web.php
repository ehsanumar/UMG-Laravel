<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiDataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductDetailsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('role:super-admin|admin')->group(function (){
    Route::get('/products', [ApiDataController::class, 'index'])->name('products');
    Route::get('/products/{id}', [ProductDetailsController::class, 'details'])->name('product.details');
});

require __DIR__.'/auth.php';
