<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $blogs = [];
//        $users_ids = collect(User::all()->modelKeys());
//        for ($i = 0; $i < 100; $i++) {
//            $blogs[] = [
//                'blog_name' => fake()->words(10, true), // === sentence(4);
//                'blog_description' => fake()->paragraphs(5, true),
//                'user_id' => $users_ids->random(),
//                'created_at' => now()->toDateTimeString(),
//                'updated_at' => now()->toDateTimeString()
//            ];
//        }
//
//        $chunks = array_chunk($blogs, 100);
//        foreach($chunks as $chunk) {
//            Blog::insert($chunk);
//        }
    }
}
