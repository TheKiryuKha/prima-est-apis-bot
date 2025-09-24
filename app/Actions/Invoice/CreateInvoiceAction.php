<?php

declare(strict_types=1);

namespace App\Actions\Invoice;

use App\Enums\InvoiceStatus;
use App\Models\Cart;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;

final readonly class CreateInvoiceAction
{
    public function __construct(
        private CreateInvoiceItemsAction $action
    ) {}

    /**
     * @param array{
     * cart_id: int,
     * first_name: string,
     * last_name: string,
     * middle_name: string,
     * delivery_address: string,
     * phone: string
     * } $attr
     */
    public function handle(array $attr): Invoice
    {
        return DB::transaction(function () use ($attr): Invoice {

            $cart = Cart::findOrFail($attr['cart_id']);
            unset($attr['cart_id']);

            $invoice = Invoice::create([
                ...$attr,
                'price' => $cart->price + 500,
                'status' => InvoiceStatus::Paid,
                'expires_at' => now()->addMinutes(5),
                'user_id' => $cart->user_id,
            ]);

            $this->action->handle($invoice, $cart);

            return $invoice;
        });
    }
}
