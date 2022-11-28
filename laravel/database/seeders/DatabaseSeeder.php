<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use App\Models\Review;
use App\Models\Blog;
use App\Models\Application;
use App\Models\Image;
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
        ]);

        $users = User::factory()->count(10)->create();

        $listings = [];
        for($i=0; $i<14; $i++)
        {
            $listings[] = Listing::factory()
                ->recycle($users)
                ->create();
        }

        for($i=0; $i<16; $i++)
        {
            Review::factory()
                ->recycle($listings)
                ->create();
        }

        for($i=0; $i<23; $i++)
        {
//            User::factory()
//                ->has(
//                    Blog::factory()->times(rand(0, 3))
//                )
//                ->create();
            Blog::factory()
                ->recycle($users)
                ->create();
        }

        for($i=0; $i<14; $i++)
        {
            Application::factory()
                ->recycle($listings)
                ->create();
        }

        for($i=0; $i<30; $i++)
        {
            Image::factory()
                ->recycle($listings)
                ->create();
        }


//        $users = User::factory()
//            ->count(10)
//            ->has(Listing::factory()
//                ->count(5)
//                ->has(
//                    Review::factory()->count(2)
//                )
//            )
////            ->has(Blog::factory()
////                ->count(Arr::random([1, 3]))
////            )
//            ->create();

//        for ($i=0; $i < 100; $i++) {
//            User::factory()
//                ->has(Blog::factory()
//                    ->count(rand(10,30)))
//                ->create();
//        }
    }
}
