<?php

declare(strict_types=1);

use App\Http\Controllers\V1\CategoryController;

Route::get('/', [CategoryController::class, 'index'])->name('index');
