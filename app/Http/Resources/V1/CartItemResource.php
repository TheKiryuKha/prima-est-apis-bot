<?php

declare(strict_types=1);

namespace App\Http\Resources\V1;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read CartItem $resource
 */
final class CartItemResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $this->resource->load('product_option');

        $option = $this->resource->product_option;
        $product = $option->product;

        return [
            'id' => $this->resource->id,
            'attributes' => [
                'amount' => $this->resource->amount,
                'title' => $product->title,
                'description' => $product->description,
                'honey_plants' => $product->honey_plants,
                'option_id' => $option->id,
                'volume' => $option->volume,
                'price' => $option->price,
                'formatted_price' => $option->formatted_price,
                'type' => $option->type,
            ],
        ];
    }
}
