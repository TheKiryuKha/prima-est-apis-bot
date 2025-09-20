<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1;

use App\Actions\User\CreateUserAction;
use App\Http\Requests\V1\User\CreateUserRequest;
use Illuminate\Http\JsonResponse;

final readonly class UserController
{
    // TODO return resource
    public function store(CreateUserRequest $request, CreateUserAction $action): JsonResponse
    {
        $action->handle($request->validated());

        return response()->json(status: 201);
    }
}
