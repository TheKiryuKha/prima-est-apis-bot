<?php

declare(strict_types=1);

use App\Models\Category;

beforeEach(function () {
    $this->category = Category::factory()->create();
    createProducts($this->category);
});

it("return's correct status code", function () {
    $this->get(route(
        'api:v1:categories:products:index',
        $this->category
    ))->assertStatus(
        200
    );
});

it("return's correct data", function () {
    $response = $this->getJson(route(
        'api:v1:categories:products:index',
        $this->category
    ));

    $response->assertJsonStructure([
        'data' => [
            '*' => [
                'id',
                'type',
                'attributes' => [
                    'title',
                    'status',
                    'description',
                    'amount',
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
                ],
            ],
        ],
    ]);
});
