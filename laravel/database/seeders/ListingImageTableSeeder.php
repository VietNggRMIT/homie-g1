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
            $foreign_key = collect(Listing::all()->modelKeys());
            while ($i < 1400) {
                yield $listingimage = [
                    'listing_image_path' => 'listing_image_path_' . rand(1, 6) .'.jpg',
                    'listing_id' => $foreign_key->random(),
                    'created_at' => fake()->dateTimeBetween('-1 year', '-6 months'),
                    'updated_at' => fake()->dateTimeBetween('-1 month', '-1 day'),
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
