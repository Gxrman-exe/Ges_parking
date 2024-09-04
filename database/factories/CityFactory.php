<?php

namespace Database\Factories;

use App\Models\Departament;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CityFactory>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $CityId = Departament::inRandomOrder()->first()->id; 
        $CityName = $this->faker->city; 
        return [
            'departament_id'=> $CityId,
            'city_name' => $CityName,
        ];
    }
}
