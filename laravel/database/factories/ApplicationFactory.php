<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date_max = fake()->date();
        $time_max = fake()->time();
        return [
            'application_description' => fake()->paragraphs(2, true),
            'listing_id' => Listing::factory(),
            'created_at' => fake()->dateTimeBetween('1970-01-01 01:01:01', $date_max." ".$time_max),
            'updated_at' => $date_max." ".$time_max,
        ];
    }
}
