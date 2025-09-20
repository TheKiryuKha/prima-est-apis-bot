<?php

declare(strict_types=1);

use App\Http\Controllers\V1\UserController;

Route::post('/', [UserController::class, 'store'])->name('store');
