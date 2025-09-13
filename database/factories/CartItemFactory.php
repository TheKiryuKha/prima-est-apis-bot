<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Cart;
use App\Models\ProductOption;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartItem>
 */
final class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cart_id' => Cart::factory(),
            'product_option_id' => ProductOption::factory(),
            'amount' => fake()->numberBetween(1, 7),
        ];
    }
}
