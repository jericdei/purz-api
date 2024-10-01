<?php

namespace Database\Factories;

use App\Enums\TransactionCreditName;
use App\Enums\TransactionDebitName;
use App\Enums\TransactionType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /** @var User */
        $user = User::inRandomOrder()->first();

        $type = TransactionType::DEBIT;

        /** @var TransactionDebitName */
        $name = $this->faker->randomElement(TransactionDebitName::cases());

        return [
            'user_id' => $user->id,
            'type' => $type,
            'name' => $name,
            'from_user_id' => $name === TransactionDebitName::RECEIVE
                ? User::inRandomOrder()->whereNot('id', $user->id)->first()->id
                : null,
            'amount' => $this->faker->randomFloat(2, 0, 100000),
        ];
    }
}
