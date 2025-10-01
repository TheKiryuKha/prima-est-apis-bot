<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1;

use App\Actions\Product\BulkCreateProduct;
use App\Http\Requests\V1\Product\CreateProductsRequest;
use App\Http\Resources\V1\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Queries\FilterProductsForCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final readonly class ProductController
{
    public function index(Category $category, FilterProductsForCategory $query): AnonymousResourceCollection
    {
        $products = $query->handle(Product::query(), $category);

        return ProductResource::collection($products->get());
    }

    public function store(CreateProductsRequest $request, BulkCreateProduct $action): JsonResponse
    {
        $action->handle($request->validated());

        return response()->json(status: 201);
    }

    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }
}
