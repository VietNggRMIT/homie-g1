<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\LazyCollection;

class BlogTableSeeder extends Seeder
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
            $foreign_key = collect(User::all()->modelKeys());
            while ($i < 150) {
                yield $review = [
//                    'blog_name' => fake()->realTextBetween(10, 100, 2),
                    'blog_name' => fake()->words(10, true), // === sentence(4);
                    'blog_description' => fake()->paragraphs(5, true),
                    'user_id' => $foreign_key->random(),
                    'created_at' => fake()->dateTimeBetween('-20 years ', '-10 years'),
                    'updated_at' => fake()->dateTimeBetween('-5 years ', '-2 years'),
                ];
                $i++;
            }
        })
            ->chunk(1000)
            ->each(function ($reviews) {
                Blog::insert($reviews->toArray());
            });
    }
}
