<?php

declare(strict_types=1);

use App\Http\Controllers\V1\ProductController;

Route::get('/{product}', [ProductController::class, 'show'])->name('show');
