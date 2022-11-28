<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'listing_id' => Listing::factory(),
        ];
    }
}
