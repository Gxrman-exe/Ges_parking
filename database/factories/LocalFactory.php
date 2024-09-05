<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LocalFactory>
 */
class LocalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $CityId = City::inRandomOrder()->first()->id; 
        return [
            'city_id' => $CityId,
            'local_name' => $this->faker->company,
            'nit' => $this->faker->bothify('###-###-###'),
            'direction' => $this->faker->address,
            'active' => $this->faker->boolean,
            'iva_enabled' => $this->faker->boolean,
            'iva_percentage' => $this->faker->randomFloat(2, 0, 99.99),
            'local_code' => $this->faker->unique()->word,
            'rate_time' => $this->faker->randomFloat(2, 0, 24), 
            'license_type' => $this->faker->word,
            'license' => $this->faker->word,
            'rate_value' => $this->faker->randomFloat(2, 0, 1000),
            'max_output_time' => $this->faker->numberBetween(0, 5),
            'available_spaces' => $this->faker->numberBetween(0, 100),
        ];
    }
}
