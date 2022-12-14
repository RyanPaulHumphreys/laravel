<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RecoveryInformation>
 */
class RecoveryInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'phone_number' => fake()->numerify('###############'),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
