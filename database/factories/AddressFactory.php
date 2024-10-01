<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Jericdei\PsgcDatabase\Models\Barangay;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $barangay = Barangay::inRandomOrder()->first();

        return [
            'region_code' => $barangay->region_code,
            'province_code' => $barangay->province_code,
            'municipality_code' => $barangay?->municipality_code,
            'sub_municipality_code' => $barangay?->sub_municipality_code,
            'city_code' => $barangay?->city_code,
            'barangay_code' => $barangay->barangay_code,
            'zip_code' => $this->faker->postcode(),
            'line_1' => $this->faker->streetAddress(),
            'line_2' => null,
        ];
    }
}
