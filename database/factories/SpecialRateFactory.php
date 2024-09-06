<?php

namespace Database\Factories;

use App\Models\RateType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SpecialRateFactory>
 */
class SpecialRateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $RateTypeId = RateType::inRandomOrder()->first()->id; 
        return [
            'rate_type_id' => $RateTypeId,
            'discount' => $this->faker->randomFloat(2, 0, 100),
            'comment' => $this->faker->text,
            'amount' => $this->faker->numberBetween(1, 60),
        ];
    }
}
