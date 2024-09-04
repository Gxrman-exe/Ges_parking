<?php

namespace Database\Factories;

use App\Models\Local;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VehicleFactory>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $LocaId = Local::inRandomOrder()->first()->id; 
        return [
            'local_id' => $LocaId,
            'plate' => $this->faker->unique()->bothify('???-###'),
            'vehicle_type' => $this->faker->randomElement(['car', 'motorcycle', 'bicycle']),
            'locker_use' => $this->faker->boolean,
            'additional_value_locker' => $this->faker->randomFloat(2, 0, 100),
            'helmet_use' => $this->faker->boolean, 
            'additional_value_case' => $this->faker->randomFloat(2, 0, 100), 
            'vehicle_status' => $this->faker->randomElement(['parked', 'removed']), 
        ];
    }
}
