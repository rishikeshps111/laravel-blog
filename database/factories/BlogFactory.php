<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Blog::class;

    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'date' => time(),
            'author' => fake()->name(),
            'content' => fake()->realText(),
            'image' => fake()->imageUrl(),
            'created_at' => time(),
            'updated_at' => time(),
        ];
    }
}
