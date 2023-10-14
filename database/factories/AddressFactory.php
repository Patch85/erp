<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    private $line2Modifiers = [
        'Apartment',
        'APT',
        'Building',
        'BLDG',
        'Department',
        'DEPT',
        'Floor',
        'FL',
        'Key',
        'PO Box',
        'Room',
        'Rm',
        'Suite',
        'STE',
        'Trailer',
        'TRLR',
        'Unit',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'attention' => fake()->name(),
            'street_address' => fake()->streetAddress(),
            'line_2' => fake()->randomElement($this->line2Modifiers).' '.fake()->randomDigit(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'postal_code' => fake()->postcode(),
            'country' => fake()->countryCode(),
        ];
    }
}
