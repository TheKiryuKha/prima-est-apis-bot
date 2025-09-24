<?php

declare(strict_types=1);

use App\Http\Controllers\V1\InvoiceController;

Route::post('/', [InvoiceController::class, 'store'])->name('store');
