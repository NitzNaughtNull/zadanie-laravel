<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\People>
 */
class PeopleFactory extends Factory
{
    // People model factory
    public function definition(): array
    {

        // creating fake entries for required columns
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'phone_number' => fake()->e164PhoneNumber(), // +48111222333
            'street' => fake()->streetName(),
            'city' => fake()->city(),
            'country' => fake()->countryISOAlpha3(), // POL, GER, FRA etc.
        ];
    }
}
