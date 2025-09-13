<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read int $id
 * @property-read int $user_id
 * @property-read int $products_amount
 * @property-read int $price
 * @property-read int $formatted_price
 * @property-read CarbonInterface $created_at
 * @property-read CarbonInterface $updated_at
 */
final class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;

    // TODO remove to builder class
    public function setPriceAttribute(int $value): void
    {
        $this->attributes['price'] = round($value * 100);
    }

    public function getPriceAttribute(int $value): int
    {
        return $value / 100;
    }

    public function getFormattedPriceAttribute(): string
    {
        return number_format(
            num: $this->price,
            thousands_separator: ' '
        ).'₽';
    }

    /**
     * @return HasMany<CartItem, $this>
     */
    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }
}
