<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\ProductStatus;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property-read string $title
 * @property-read string $type
 * @property-read ProductStatus $status
 * @property-read string $description
 * @property-read int $amount
 * @property-read int $category_id
 * @property-read CarbonInterface $created_at
 * @property-read CarbonInterface $updated_at
 */
final class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    /**
     * @return array<string, string>
     */
    public function casts(): array
    {
        return [
            'status' => ProductStatus::class,
        ];
    }
}
