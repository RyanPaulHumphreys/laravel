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
            'src' => fake()->imageUrl($width=640, $height=480),
            'mime_type' => 'image/jpeg',
            'description' => fake()->sentence(),
            'alt' => fake()->sentence()
        ];
    }
}
