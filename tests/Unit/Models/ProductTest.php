<?php

declare(strict_types=1);

use App\Enums\ProductStatus;
use App\Models\Category;
use App\Models\Product;

test('to array', function () {
    $product = Product::factory()->create()->fresh();

    expect(array_keys($product->toArray()))
        ->toBe([
            'id',
            'title',
            'type',
            'status',
            'description',
            'amount',
            'category_id',
            'created_at',
            'updated_at',
        ]);
});

test('status', function () {
    $product = Product::factory()->create();

    expect($product->status)
        ->toBeInstanceOf(ProductStatus::class);
});

it('belongs to Category', function () {
    $product = Product::factory()->create();

    expect($product->category)->toBeInstanceOf(Category::class);
});
