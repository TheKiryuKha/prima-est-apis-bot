<?php

declare(strict_types=1);

namespace App\Actions\Invoice;

use App\Actions\Cart\DeleteCartAction;
use App\Enums\InvoiceStatus;
use App\Models\Cart;
use App\Models\Invoice;
use App\Services\CDEKAPIService;
use Illuminate\Support\Facades\DB;

final readonly class CreateInvoiceAction
{
    public function __construct(
        private CreateInvoiceItemsAction $create_items,
        private DeleteCartAction $delete_cart,
        private CDEKAPIService $api,
    ) {}

    /**
     * @param array{
     * cart_id: int,
     * city_code: int,
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

            $city_code = $attr['city_code'];
            unset($attr['city_code']);

            $country = $this->api->getCityAdress($city_code);

            $invoice = Invoice::create([
                ...$attr,
                'delivery_address' => $country.$attr['delivery_address'],
                'delivery_price' => 0,
                'total_price' => 0,
                'price' => $cart->price,
                'status' => InvoiceStatus::Created,
                'expires_at' => now()->addMinutes(5),
                'user_id' => $cart->user_id,
            ]);

            $weight = $this->create_items->handle($invoice, $cart);

            $delivery_price = $this->api->getDeliveryPrice($city_code, $weight);

            $invoice->update([
                'delivery_price' => $delivery_price,
                'total_price' => $invoice->price + $delivery_price,
            ]);

            $this->delete_cart->handle($cart);

            return $invoice;
        });
    }
}
