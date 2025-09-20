<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1;

use App\Actions\Cart\CreateCartItemAction;
use App\Http\Requests\V1\CartItem\CreateCartItemRequest;
use Illuminate\Http\JsonResponse;

final readonly class CartItemController
{
    // TODO return resource
    public function store(CreateCartItemRequest $request, CreateCartItemAction $action): JsonResponse
    {
        $action->handle($request->getCart(), $request->getOption());

        return response()->json(status: 201);
    }
}
