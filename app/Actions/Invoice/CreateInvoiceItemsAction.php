<?php

declare(strict_types=1);

namespace App\Actions\Invoice;

use App\Models\Cart;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;

final readonly class CreateInvoiceItemsAction
{
    public function handle(Invoice $invoice, Cart $cart): int
    {
        return DB::transaction(function () use ($invoice, $cart): int {
            /** @var int $total_weight */
            $total_weight = 0;

            foreach ($cart->items as $item) {
                $invoice->items()->create([
                    'product_option_id' => $item->product_option_id,
                    'amount' => $item->amount,
                ]);
                $total_weight += $item->product_option->weight * $item->amount;
            }

            return $total_weight;
        });
    }
}
