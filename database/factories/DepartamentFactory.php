<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DepartamentFactory>
 */
class DepartamentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $CountryId = Country::inRandomOrder()->first()->id;
        $DepartamentName = $this->faker->country();
        $DepartamentCode = $this->faker->unique()->countryCode();
        return [
            'country_id' => $CountryId,
            'departament_name' => $DepartamentName, 
            'departament_code' => $DepartamentCode,
        ];
    }
}
