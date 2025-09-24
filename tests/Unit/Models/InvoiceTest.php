<?php

declare(strict_types=1);

use App\Enums\InvoiceStatus;
use App\Models\Invoice;

test('to array', function () {
    $invoice = Invoice::factory()->create()->fresh();

    expect(array_keys($invoice->toArray()))
        ->toBe([
            'id',
            'status',
            'first_name',
            'last_name',
            'middle_name',
            'delivery_address',
            'phone',
            'price',
            'user_id',
            'expires_at',
            'created_at',
            'updated_at',
        ]);
});

test('status', function () {
    $invoice = Invoice::factory()->create();

    expect($invoice->status)->toBeInstanceOf(InvoiceStatus::class);
});
