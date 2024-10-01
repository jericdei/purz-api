<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->lastName(),
            'last_name' => $this->faker->lastName(),
            'suffix' => $this->faker->randomElement(['Jr.', 'Sr.', 'II', 'III', 'IV']),
            'birthday' => $this->faker->date(max: 'now - 18 years'),
            'avatar_url' => null,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'contact_number' => $this->faker->phoneNumber(),
            'address_id' => Address::factory(),
        ];
    }
}
