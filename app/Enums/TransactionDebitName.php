<?php

namespace App\Enums;

enum TransactionDebitName: string
{
    case RECEIVE = 'receive';
    case CASH_IN = 'cash_in';
}
