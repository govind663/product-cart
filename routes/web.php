<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/{id}', [ProductController::class, 'show'])
    ->name('products.show');
    

/*
|--------------------------------------------------------------------------
| Cart Routes (Session Based)
|--------------------------------------------------------------------------
*/

Route::prefix('cart')->group(function () {

    Route::get('/', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/add', [CartController::class, 'add'])
        ->name('cart.add');

    Route::post('/update', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/remove/{id}', [CartController::class,'remove'])
    ->name('cart.remove');

});
