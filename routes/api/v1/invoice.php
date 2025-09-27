<?php

declare(strict_types=1);

use App\Http\Controllers\V1\InvoiceController;
use App\Http\Controllers\V1\PayInvoiceController;
use App\Http\Controllers\V1\SendInvoiceController;

Route::post('/', [InvoiceController::class, 'store'])->name('store');

Route::patch('/{invoice}/paid', PayInvoiceController::class)->name('pay');
Route::patch('/{invoice}/send', SendInvoiceController::class)->name('send');
