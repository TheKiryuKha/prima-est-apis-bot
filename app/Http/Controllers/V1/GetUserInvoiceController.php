<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1;

use App\Http\Resources\V1\InvoiceResource;
use App\Models\User;
use App\Queries\FetchInvoices;

final readonly class GetUserInvoiceController
{
    public function __invoke(User $user, FetchInvoices $query): InvoiceResource
    {
        $invoice = $query->handle(
            $user->invoices()->getQuery()
        );

        return new InvoiceResource($invoice->firstOrFail());
    }
}
