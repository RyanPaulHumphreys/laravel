<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
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
            //'src' => asset('images')."/placeholder.jpg",
            'src' => fake()->imageUrl(480,480),
            'mime_type' => 'jpg',
            'description' => fake()->sentence(),
            'alt' => fake()->sentence()
        ];
    }
}
