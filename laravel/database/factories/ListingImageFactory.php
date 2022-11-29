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
        return [
            //
            'listing_image_path' => 'listing_image_path_' . rand(1, 6) .'.jpg',
//            'image_path' => storage_path('app\public\listing_image-' . rand(1, 3) .'.jpg'),
//            'image_path' => fake()->imageUrl(640, 480, 'listing', true, 'image', false),
            'listing_id' => Listing::factory(),
        ];
    }
}
