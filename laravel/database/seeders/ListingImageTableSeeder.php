<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\LazyCollection;

class ListingImageTableSeeder extends Seeder
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
            $date_time_max = fake()->dateTimeBetween();
            $foreign_key = collect(Listing::all()->modelKeys());
            while ($i < 8000) {
                yield $listingimage = [
                    'listing_image_path' => 'listing_image_path_' . rand(1, 3) .'.jpg',
                    'listing_id' => $foreign_key->random(),
//                    'created_at' => fake()->dateTimeBetween('1970-01-01 01:01:01', $date_time_max),
//                    'updated_at' => $date_time_max,
                    'created_at' => fake()->dateTimeBetween('-20 years ', '-10 years'),
                    'updated_at' => fake()->dateTimeBetween('-5 years ', '-2 years'),
                ];
                $i++;
            }
        })
            ->chunk(1000)
            ->each(function ($listingimages) {
                ListingImage::insert($listingimages->toArray());
            });
    }
}
