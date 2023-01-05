<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ListingImageFactory extends Factory
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
            'listing_image_path' => 'listing_image_path_' . rand(1, 3) .'.jpg',
//            'image_path' => storage_path('app\public\listing_image-' . rand(1, 3) .'.jpg'),
//            'image_path' => fake()->imageUrl(640, 480, 'listing', true, 'image', false),
            'listing_id' => Listing::factory(),
            'created_at' => fake()->dateTimeBetween('1970-01-01 01:01:01', $date_max." ".$time_max),
            'updated_at' => $date_max." ".$time_max,
        ];
    }
}
