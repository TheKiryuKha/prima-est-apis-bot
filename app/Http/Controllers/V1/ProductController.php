<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1;

use App\Http\Resources\V1\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Queries\FilterProductsForCategory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final readonly class ProductController
{
    public function index(Category $category, FilterProductsForCategory $query): AnonymousResourceCollection
    {
        $products = $query->handle(Product::query(), $category);

        return ProductResource::collection($products->get());
    }

    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }
}
