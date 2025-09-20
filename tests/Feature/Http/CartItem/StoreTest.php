<?php

declare(strict_types=1);

use App\Models\Product;
use App\Models\ProductOption;

beforeEach(function () {
    $this->product = Product::factory()->create();
    $this->option = ProductOption::factory()
        ->for($this->product)
        ->create();

    $this->data = [
        'chat_id' => 1,
        'option_id' => $this->option->id,
        'amount' => 3,
    ];
});

it("return's correct status code", function () {
    $this->post(
        route('api:v1:cart_item:store'), $this->data
    )->assertStatus(
        201
    );
})->skip();

it("save's cartItem in DB");

it("Update's cart's data");
