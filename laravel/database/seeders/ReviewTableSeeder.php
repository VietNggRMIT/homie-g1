<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\LazyCollection;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LazyCollection::make(function () {
            $i = 0;
            $foreign_key = collect(Listing::all()->modelKeys());
            while ($i < 4000) {
                yield $review = [
                    'review_name' => fake()->optional()->name(),
                    'review_description' => fake()->realTextBetween(10, 200, 2),
                    'review_rating' => fake()->numberBetween(1,5),
                    'review_image_path' => 'user_image_path.jpg',
                    'listing_id' => $foreign_key->random(),
                    'created_at' => fake()->dateTimeBetween('-1 year', '-6 months'),
                    'updated_at' => fake()->dateTimeBetween('-1 month', '-1 day'),
                ];
                $i++;
            }
        })
            ->chunk(1000)
            ->each(function ($reviews) {
                Review::insert($reviews->toArray());
            });
    }
}
