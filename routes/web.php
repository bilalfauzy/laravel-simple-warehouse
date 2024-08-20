<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::resource('product', ProductController::class);
});