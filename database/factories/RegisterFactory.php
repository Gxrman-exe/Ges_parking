<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegisterFactory>
 */
class RegisterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $UserId = User::inRandomOrder()->first()->id;
        $VehicleId = Vehicle::inRandomOrder()->first()->id;
        return [
            'user_id' => $UserId,
            'vehicle_id' => $VehicleId,
            'user_code' => $this->faker->word,
            'have_permission' => $this->faker->boolean,
            'action_performed' => $this->faker->sentence,
            'date' => $this->faker->date,
            'module_code' => $this->faker->word,
            'date_time_admission' => $this->faker->dateTime,
            'date_time_exit' => $this->faker->dateTime,
            'comment' => $this->faker->text,
        ];
    }
}
