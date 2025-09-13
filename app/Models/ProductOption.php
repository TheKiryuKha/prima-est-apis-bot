<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int $id
 * @property-read int $volume
 * @property-read int $price
 * @property-read string $type
 * @property-read int $product_id
 * @property-read string $formatted_price
 * @property-read CarbonInterface $created_at
 * @property-read CarbonInterface $updated_at
 * @property-read Product $product
 */
final class ProductOption extends Model
{
    /** @use HasFactory<\Database\Factories\ProductOptionFactory> */
    use HasFactory;

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
     * @return BelongsTo<Product, $this>
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
