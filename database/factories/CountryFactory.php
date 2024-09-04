<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CountryFactory>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $uniqueCountryName = $this->faker->unique()->country;
        $uniqueCountryCode = $this->faker->unique()->countryCode;
        return [
            'country_name' => $uniqueCountryName,
            'country_code' => $uniqueCountryCode,
        ];
    }
}
