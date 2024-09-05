<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentHistoryFactory>
 */
class PaymentHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $PaymentId = Payment::inRandomOrder()->first()->id;
        return [
            'payment_id' => $PaymentId,
            'mount_pay' => $this->faker->randomFloat(2, 0, 1000),
            'plate' => $this->faker->unique()->bothify('???###'),
            'payment_status' => $this->faker->randomElement(['pending', 'processed', 'failed']),
            'registration_date' => $this->faker->date(),
        ];
    }
}
