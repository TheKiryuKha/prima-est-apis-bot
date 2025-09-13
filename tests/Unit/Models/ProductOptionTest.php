<?php

declare(strict_types=1);

use App\Models\ProductOption;

test('to array', function () {
    $product_option = ProductOption::factory()->create()->fresh();

    expect(array_keys($product_option->toArray()))
        ->toBe([
            'id',
            'volume',
            'price',
            'type',
            'product_id',
            'created_at',
            'updated_at',
        ]);
});
