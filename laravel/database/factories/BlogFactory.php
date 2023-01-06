<?php

namespace Database\Factories;

use App\Models\User;
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
    public function definition()
    {
        return [
//            'blog_name' => fake()->realTextBetween(10, 100, 2),
            'blog_name' => fake()->words(10, true), // === sentence(4);
            'blog_description' => fake()->paragraphs(5, true),
            'user_id' => User::factory(),
            'created_at' => fake()->dateTimeBetween('-1 year', '-6 months'),
            'updated_at' => fake()->dateTimeBetween('-1 month', '-1 day'),
        ];
    }
}
