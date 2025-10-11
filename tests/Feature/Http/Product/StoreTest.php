<?php

declare(strict_types=1);
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

it("return's correct status code", function () {
    $this->post(
        route('api:v1:products:store'), get_product_data()
    )->assertStatus(
        201
    );
});

it("save's product's data in DB", function () {
    $data = get_product_data();

    $this->post(route('api:v1:products:store'), $data);

    $this->assertDatabaseCount('products', 1);
});

it("save's categories in DB", function () {
    $data = get_product_data();

    $this->post(route('api:v1:products:store'), $data);

    $this->assertDatabaseCount('categories', 1);
});

it("save's option's in DB", function () {
    $data = get_product_data();

    $this->post(route('api:v1:products:store'), $data);

    $this->assertDatabaseCount('product_options', 3);
});

it('drops Cache', function () {
    Cache::remember('categories', 86400, fn () => Category::factory()->create());

    $this->post(route('api:v1:products:store'), get_product_data());

    expect(Cache::has('categories'))->toBeFalse();
});

it("save's media", function () {
    Storage::fake();

    $this->post(route('api:v1:products:store'), get_product_data());

    expect(Product::first()->getFirstMedia('image'))
        ->toBeInstanceOf(Media::class);
});

test('validation', function () {
    $response = $this->post(route('api:v1:products:store'));

    $response->assertInvalid([
        'image_link',
        'title',
        'description',
        'category_title',
        'options',
    ]);
});
