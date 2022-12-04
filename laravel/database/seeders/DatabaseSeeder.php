<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use App\Models\Review;
use App\Models\Blog;
use App\Models\Application;
use App\Models\ListingImage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserTableSeeder::class,
            ListingTableSeeder::class,
            ReviewTableSeeder::class,
            BlogTableSeeder::class,
            ApplicationTableSeeder::class,
            ListingImageTableSeeder::class,
        ]);

//        =============================================================================================
//        !IMPORTANT: DO NOT DELETE BELOW
//        =============================================================================================

        $users = User::factory()
            ->count(10)
            ->create();

        $listings = Listing::factory()
            ->count(14)
            ->recycle($users)
            ->has(Review::factory()->times(2))
            ->has(Application::factory()->times(2))
            ->has(ListingImage::factory()->times(2))
            ->create();

//        Review::factory()
//            ->count(16)
//            ->recycle($listings)
//            ->create();

        Blog::factory()
            ->count(23)
            ->recycle($users)
            ->create();

//        Application::factory()
//            ->count(14)
//            ->recycle($listings)
//            ->create();

//        ListingImage::factory()
//            ->count(30)
//            ->recycle($listings)
//            ->create();

//        =============================================================================================
//        !IMPORTANT: DO NOT DELETE BELOW
//        =============================================================================================

//        `for loop` same as `count(rand(10,30))` same as `times(rand(10, 30)) same as `factory(rand(10,30))`

//        Usage: Create 3 Users, with 2-3 Blogs.
//        User::factory()
//            ->count(3)
//            ->has(Blog::factory()->times(rand(2, 3)))
//            ->create();

//        Usage: Create 3 Users, with 2-3 Blogs.
//        for ($i=0; $i < 3; $i++) {
//            User::factory()
//                ->has(Blog::factory()->count(rand(2,3)))
//                ->create();
//        }

//        =============================================================================================
//        !IMPORTANT: DO NOT DELETE BELOW
//        =============================================================================================

//        Usage: Create 30 ListingImage. For loop with the same function as ->count(30);
//        for($i=0; $i<30; $i++)
//        {
//            ListingImage::factory()
//                ->recycle($listings)
//                ->create();
//        }

//        Usage: 10 Users x 5 Listings (x 1 Review x 2 Application x 3 ListingImage) x 3 Blogs
//        $users = User::factory()
//            ->count(10)
//            ->has(Listing::factory()->count(5)
//                ->has(Review::factory()->count(1))
//                ->has(Application::factory()->count(2))
//                ->has(ListingImage::factory()->count(3))
//            )
////            ->has(Blog::factory()
////                ->count(3)
//////                ->count(Arr::random([1, 3]))
////            )
//            ->create();
    }
}
