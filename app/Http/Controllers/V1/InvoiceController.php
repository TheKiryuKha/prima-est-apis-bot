<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1;

use App\Actions\Invoice\CreateInvoiceAction;
use App\Http\Requests\V1\Invoice\CreateInvoiceRequest;
use App\Http\Resources\V1\InvoiceResource;

final readonly class InvoiceController
{
    public function store(CreateInvoiceRequest $request, CreateInvoiceAction $action): InvoiceResource
    {
        $invoice = $action->handle($request->validated());

        return new InvoiceResource($invoice);
    }
}
