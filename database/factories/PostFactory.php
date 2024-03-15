<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'user_id' => random_int(1, 3),
            'body' => fake()->sentences(random_int(5, 25)),
            'summary' => fake()->paragraphs(2),
            'cover_image' => fake()->imageUrl(),
            'category_id' => random_int(1, 2)
        ];
    }
}
