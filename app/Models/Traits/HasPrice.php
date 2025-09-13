<?php

declare(strict_types=1);

namespace App\Models\Traits;

trait HasPrice
{
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
}
