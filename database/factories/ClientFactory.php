<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClientFactory>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'names' => $this->faker->firstName . ' ' . $this->faker->lastName,
            'surnames' => $this->faker->lastName . ' ' . $this->faker->lastName,
            'document_type' => $this->faker->randomElement(['DNI', 'Passport', 'ID Card']),
            'document' => $this->faker->unique()->numerify('##########'),
            'e_mail' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->optional()->phoneNumber,
            'direction' => $this->faker->address,
        ];
    }
}
