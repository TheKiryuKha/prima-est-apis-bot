<?php

declare(strict_types=1);

namespace App\Http\Resources\V1;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Product $resource
 */
final class ProductResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $this->resource->load('options');

        return [
            'id' => $this->resource->id,
            'type' => 'product',
            'attributes' => [
                'title' => $this->resource->title,
                'type' => $this->resource->type,
                'status' => $this->resource->status,
                'description' => $this->resource->description,
                'amount' => $this->resource->amount,
                'honey_plants' => $this->resource->honey_plants,
                'options' => ProductOptionResource::collection(
                    $this->whenLoaded('options')
                ),
                'media' => new MediaResource(
                    $this->resource->getMedia('image')->first()
                ),
            ],
        ];
    }
}
