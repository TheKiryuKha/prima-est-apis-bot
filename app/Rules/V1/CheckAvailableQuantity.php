<?php

declare(strict_types=1);

namespace App\Rules\V1;

use App\Models\Cart;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final class CheckAvailableQuantity implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $cart = Cart::findOrFail($value)->firstOrFail();

        foreach ($cart->items as $item) {
            $product_amount = $item->product_option->product->amount;
            $product_title = $item->product_option->product->title;

            if ($item->amount > $product_amount) {
                $fail("В данный момент на складе нет такого количества товара {$product_title}");
            }
        }
    }
}
