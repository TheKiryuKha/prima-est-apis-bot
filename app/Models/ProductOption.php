<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property-read int $volume
 * @property-read int $price
 * @property-read string $type
 * @property-read CarbonInterface $created_at
 * @property-read CarbonInterface $updated_at
 */
final class ProductOption extends Model
{
    /** @use HasFactory<\Database\Factories\ProductOptionFactory> */
    use HasFactory;
}
