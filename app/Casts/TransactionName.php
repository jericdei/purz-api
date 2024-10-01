<?php

namespace App\Casts;

use App\Enums\TransactionCreditName;
use App\Enums\TransactionDebitName;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class TransactionName implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): TransactionDebitName|TransactionCreditName
    {
        return TransactionDebitName::tryFrom($value)
            ?: TransactionCreditName::tryFrom($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): string
    {
        /** @var TransactionDebitName|TransactionCreditName $value */
        return $value->value;
    }
}
