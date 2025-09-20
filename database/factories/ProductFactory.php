<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\ProductStatus;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOption;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
final class ProductFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'type' => fake()->words(2, true),
            'description' => fake()->text(),
            'category_id' => Category::factory(),
            'amount' => fake()->numberBetween(1, 100),
            'status' => ProductStatus::InStock,
        ];
    }

    public function hidden(): self
    {
        return $this->state(fn (array $attributes): array => [
            'status' => ProductStatus::Hidden,
        ]);
    }

    public function withImage(): self
    {
        return $this->state(fn (array $attributes): array => [])
            ->afterCreating(function (Product $product): void {
                $product->addMedia(
                    UploadedFile::fake()->image('test.png')
                )->toMediaCollection('image');
            });
    }

    public function withOptions(int $amount): self
    {
        return $this->state(fn (array $attributes): array => [])
            ->afterCreating(function (Product $product) use ($amount): void {
                ProductOption::factory($amount)
                    ->for($product)
                    ->create();
            });
    }
}
