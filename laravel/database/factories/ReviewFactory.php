<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'review_name' => fake()->optional()->name(),
            'review_description' => fake()->realTextBetween(10, 200, 2),
            'review_rating' => fake()->numberBetween(1,5),
            'review_image_path' => ['richard-stallman.png', 'linus-torvalds.webp'][array_rand([0, 1])],
            'listing_id' => Listing::factory(),
        ];
    }
}
