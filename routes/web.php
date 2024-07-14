<?php

use App\Http\Controllers\productController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/products', [productController::class, 'index']);
Route::get('/products/create', [productController::class, 'create']);
Route::post('/products', [productController::class, 'store'])->name('products.create');
Route::get('/products/{product}', [productController::class, 'show']);
Route::get('/products/{product}/edit', [productController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [productController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [productController::class, 'destroy'])->name('products.delete');

require __DIR__.'/auth.php';
