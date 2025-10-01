<?php

declare(strict_types=1);

use App\Http\Controllers\V1\ProductController;

Route::post('/', [ProductController::class, 'store'])->name('store');

Route::get('/{product}', [ProductController::class, 'show'])->name('show');
