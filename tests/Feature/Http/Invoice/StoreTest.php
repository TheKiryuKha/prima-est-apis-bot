<?php

declare(strict_types=1);

use App\Enums\InvoiceStatus;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Log;

beforeEach(function () {
    $this->cart = Cart::factory()->withItem(3)->create();
    $this->data = [
        'cart_id' => $this->cart->id,
        'first_name' => 'Трахомир',
        'last_name' => 'Древарх',
        'middle_name' => 'Просветленный',
        'delivery_address' => 'Солнечная система, планета Нибиру, ул. Рептильная 5',
        'phone' => '375447191945',
    ];
});

it("return's correct status code", function () {
    $this->post(
        route('api:v1:invoices:store'), $this->data
    )->assertStatus(
        201
    );
});

it("save's invoice in DB", function () {
    $this->post(route('api:v1:invoices:store'), $this->data);

    $this->assertDatabaseHas('invoices', [
        'first_name' => $this->data['first_name'],
        'last_name' => $this->data['last_name'],
        'middle_name' => $this->data['middle_name'],
        'delivery_address' => $this->data['delivery_address'],
        'phone' => $this->data['phone'],
        'user_id' => $this->cart->user_id,
        'price' => ($this->cart->price + 500) * 100,
        'status' => InvoiceStatus::Paid,
        'expires_at' => now()->addMinutes(5),
    ]);
});

it("save's invoice items in DB", function () {
    $this->post(route('api:v1:invoices:store'), $this->data);

    Log::info(CartItem::all());

    $this->assertDatabaseHas('invoice_items', [
        'amount' => 3,
    ]);
});

it("clear's cart");

it("return's correct data", function () {
    $response = $this->post(route('api:v1:invoices:store'), $this->data);

    $response->assertJsonStructure([
        'data' => [
            'id',
            'type',
            'attributes' => [
                'user_id',
                'username',
                'first_name',
                'last_name',
                'middle_name',
                'delivery_address',
                'phone',
                'price',
                'formatted_price',
                'items' => [
                    '*' => [
                        'id',
                        'attributes' => [
                            'amount',
                            'title',
                            'description',
                            'honey_plants',
                            'option_id',
                            'volume',
                            'price',
                            'formatted_price',
                            'total_price',
                            'type',
                        ],
                    ],
                ],
            ],
        ],
    ]);
});

test('validation', function () {
    $this->post(
        route('api:v1:invoices:store')
    )->assertInvalid([
        'cart_id',
        'first_name',
        'last_name',
        'middle_name',
        'delivery_address',
        'phone',
    ]);
});
