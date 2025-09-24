<?php

declare(strict_types=1);

namespace App\Enums;

enum InvoiceStatus: string
{
    case Paid = 'paid';
    case Processing = 'processing';
    case Sent = 'sent';
}
