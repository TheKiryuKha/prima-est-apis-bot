<?php

declare(strict_types=1);
use App\Models\Product;

beforeEach(function () {
    $this->product = Product::factory()
        ->withImage()
        ->withOptions(3)
        ->create();
});

it("return's correct status code", function () {
    $this->get(
        route('api:v1:products:show', $this->product)
    )->assertStatus(
        200
    );
});

it("return's correct data", function () {
    $response = $this->get(route('api:v1:products:show', $this->product));

    $response->assertJsonStructure([
        'data' => [
            'id',
            'type',
            'attributes' => [
                'title',
                'type',
                'status',
                'description',
                'amount',
                'honey_plants',
                'options' => [
                    '*' => [
                        'id',
                        'type',
                        'attributes' => [
                            'volume',
                            'price',
                            'type',
                            'formatted_price',
                        ],
                    ],
                ],
                'media' => [
                    'type',
                    'path',
                ],
            ],
        ],
    ]);
});
