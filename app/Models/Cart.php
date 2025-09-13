<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property-read int $user_id
 * @property-read int $products_amount
 * @property-read int $price
 * @property-read CarbonInterface $created_at
 * @property-read CarbonInterface $updated_at
 */
final class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;
}
