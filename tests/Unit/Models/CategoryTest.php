<?php

declare(strict_types=1);

use App\Models\Category;

test('to array', function () {
    $category = Category::factory()->create()->fresh();

    expect(array_keys($category->toArray()))
        ->toBe([
            'id',
            'title',
            'created_at',
            'updated_at',
        ]);
});
