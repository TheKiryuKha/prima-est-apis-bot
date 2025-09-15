<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1;

use App\Http\Resources\V1\CategoryResource;
use App\Services\CategoryCache;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class CategoryController
{
    public function index(CategoryCache $service): AnonymousResourceCollection
    {
        return CategoryResource::collection($service->cache());
    }
}
