<?php

namespace App\Enums;

enum TransactionCreditName: string
{
    case SEND = 'send';
    case CASH_OUT = 'cash_out';
}
