<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\LazyCollection;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        VERSION 1: JUST array_chunk
//        $users = [];
//        for ($i = 0; $i < 500000; $i++) {
//            $users[] = [
//                'user_email_address' => fake()->unique()->freeEmail(),
//                'user_phone_number' => fake()->unique()->e164PhoneNumber(),
//                'user_password' => fake()->password(),
//                'user_real_name' => fake()->name(),
//                'user_image_path' => "user_image_path_".fake()->numberBetween(1, 3).".jpg",
//                'user_description' => fake()->realTextBetween(10, 100, 2),
//                'created_at' => now()->toDateTimeString(),
//                'updated_at' => now()->toDateTimeString()
//            ];
//        }
//
//        $chunks = array_chunk($users, 10);
//        foreach($chunks as $chunk) {
//            User::insert($chunk);
//        }

//        VERSION 1.5: JUST array_chunk WITH UNLIMITED MEMORY
//        ini_set('memory_limit', -1);

//        VERSION 2: LazyCollection, with array_chunk
//        LazyCollection::make(function () {
//            $i = 0;
//            while ($i < 400000) {
//                yield $user = [
//                    'user_email_address' => fake()->unique()->freeEmail(),
//                    'user_phone_number' => fake()->unique()->e164PhoneNumber(),
//                    'user_password' => fake()->password(),
//                    'user_real_name' => fake()->name(),
//                    'user_image_path' => "user_image_path_".fake()->numberBetween(1, 3).".jpg",
//                    'user_description' => fake()->realTextBetween(10, 100, 2),
//                    'created_at' => now()->toDateTimeString(),
//                    'updated_at' => now()->toDateTimeString()
//                ];
//                $i++;
//            }
//        })
//            ->chunk(10000) // split in chunk to reduce the number of queries
//            ->each(function ($users) {
//
////                $list = [];
////                foreach ($users as $user) {
////                    $list[] = $user;
////                }
//
//                // insert 10000 rows in one shot
//                $chunks = array_chunk($users->toArray(), 10);
//                foreach($chunks as $chunk) {
//                    User::insert($chunk);
//                }
//
//            });

        // VERSION 3: LazyCollection, with array_chunk
        LazyCollection::make(function () {
            $i = 0;
            while ($i < 400000) {
                yield $user = [
                    'user_email_address' => fake()->unique()->freeEmail(),
                    'user_phone_number' => fake()->unique()->e164PhoneNumber(),
                    'user_password' => fake()->password(),
                    'user_real_name' => fake()->name(),
                    'user_image_path' => "user_image_path_".fake()->numberBetween(1, 3).".jpg",
                    'user_description' => fake()->realTextBetween(10, 100, 2),
                    'created_at' => now()->toDateTimeString(),
                    'updated_at' => now()->toDateTimeString()
                ];
                $i++;
            }
        })
            ->chunk(1000) // Split into X chunks to reduce the number of queries
            ->each(function ($users) {

                // From 10,000 chunks divided into Y smaller array_chunks
                // Yes (X,Y): 10000 10, 1000 n/a
                // No (X,Y): 10000 5000, 10000 1000, 10000 n/a, 5000 n/a,
//                $chunks = array_chunk($users->toArray(), 1000);
//                foreach($chunks as $chunk) {
                    User::insert($users->toArray());
//                }

            });
    }
}
