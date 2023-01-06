<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\Application;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\LazyCollection;

class ApplicationTableSeeder extends Seeder
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
            while ($i < 1200) {
                yield $application = [
                    'application_description' => fake()->paragraphs(2, true),
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
            ->each(function ($applications) {
                Application::insert($applications->toArray());
            });
    }
}
