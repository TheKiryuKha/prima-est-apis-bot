<?php

declare(strict_types=1);
use App\Models\Product;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

it("return's correct status code", function () {
    $this->post(
        route('api:v1:products:store'), get_products_data()
    )->assertStatus(
        201
    );
});

it("save's product's data in DB", function () {
    $data = get_products_data();

    $this->post(route('api:v1:products:store'), $data);

    $this->assertDatabaseCount('products', 3);
});

it("save's categories in DB", function () {
    $data = get_products_data();

    $this->post(route('api:v1:products:store'), $data);

    $this->assertDatabaseCount('categories', 2);
});

it("save's option's in DB", function () {
    $data = get_products_data();

    $this->post(route('api:v1:products:store'), $data);

    $this->assertDatabaseCount('product_options', 9);
});

it("save's media", function () {
    $data = get_products_data();

    $this->post(route('api:v1:products:store'), $data);

    Product::all()->each(function (Product $product) {
        return expect($product->getFirstMedia('image'))->toBeInstanceOf(Media::class);
    });
});

test('validation', function () {
    $response = $this->post(route('api:v1:products:store'), [[]]);

    $response->assertInvalid([
        '0.image',
        '0.title',
        '0.description',
        '0.category',
        '0.options',
    ]);
});
