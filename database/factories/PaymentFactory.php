<?php

namespace Database\Factories;

use App\Models\PaymentMethod;
use App\Models\SpecialRate;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentFactory>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $PaymentMethodId = PaymentMethod::inRandomOrder()->first()->id; 
        $SpecialRateId = SpecialRate::inRandomOrder()->first()->id; 
        $VehicleId = Vehicle::inRandomOrder()->first()->id; 
        return [
            'payment_method_id' => $PaymentMethodId,
            'special_rate_id' => $SpecialRateId,
            'vehicle_id' => $VehicleId,
            'payment_date' => $this->faker->date(),
            'paid_amount' => $this->faker->randomFloat(2, 0, 1000),
            'payment_status' => $this->faker->randomElement(['pending', 'processed', 'failed']),
        ];
    }
}
