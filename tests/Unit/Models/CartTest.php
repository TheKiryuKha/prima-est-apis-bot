<?php

declare(strict_types=1);

use App\Models\Cart;

test('to array', function () {
    $cart = Cart::factory()->create();

    expect(array_keys($cart->toArray()))
        ->toBe([
            'user_id',
            'products_amount',
            'price',
            'updated_at',
            'created_at',
            'id',
        ]);
});
