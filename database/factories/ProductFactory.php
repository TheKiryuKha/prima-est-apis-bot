<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\ProductStatus;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
}
