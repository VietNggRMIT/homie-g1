<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\LazyCollection;

class ListingTableSeeder extends Seeder
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
            $vietnam_provinces = ['Ha Noi','Ha Giang','Cao Bang','Bac Kan','Tuyen Quang','Lao Cai','Dien Bien','Lai Chau','Son La','Yen Bai','Hoa Binh','Thai Nguyen','Lang Son','Quang Ninh','Bac Giang','Phu Tho','Vinh Phuc','Bac Ninh','Hai Duong','Hai Phong','Hung Yen','Thai Binh','Ha Nam','Nam Dinh','Ninh Binh','Thanh Hoa','Nghe An','Ha Tinh','Quang Binh','Quang Tri','Thua Thien Hue','Da Nang','Quang Nam','Quang Ngai','Binh Dinh','Phu Yen','Khanh Hoa','Ninh Thuan','Binh Thuan','Kon Tum','Gia Lai','Dak Lak','Dak Nong','Lam Dong','Binh Phuoc','Tay Ninh','Binh Duong','Dong Nai','Ba Ria - Vung Tau','Ho Chi Minh','Long An','Tien Giang','Ben Tre','Tra Vinh','Vinh Long','Dong Thap','An Giang','Kien Giang','Can Tho','Hau Giang','Soc Trang','Bac Lieu','Ca Mau'];
            $foreign_key = collect(User::all()->modelKeys());
            while ($i < 200) {
                yield $listing = [
                    'listing_name' => fake()->words(5, true), // === sentence(4);
                    'listing_description' => fake()->paragraphs(3, true),
                    'listing_address_subdivision_1' => fake()->randomElement($vietnam_provinces), // fake()->city()
                    'listing_address_subdivision_2' => fake()->optional()->streetName(),
                    'listing_address_subdivision_3' => fake()->optional()->streetAddress(),
                    'listing_address_latitude' => fake()->latitude($min = 20, $max = 21),
                    'listing_address_longitude' => fake()->longitude($min = 104, $max = 106),
                    'listing_price' => fake()->numberBetween(500, 20000).'000', // 500k->20m VND
                    'listing_available' => fake()->numberBetween(0,1), // 0,1 is FALSE, TRUE
                    'listing_specification_bathroom' => fake()->numberBetween(0, 3), // 0-3 bathrooms
                    'listing_specification_bedroom' => fake()->numberBetween(0, 4), // 0-4 bedrooms
                    'listing_specification_size' => fake()->numberBetween(5, 120), // 5-120 m2
                    'listing_specification_owner' => fake()->numberBetween(0, 1), // 0,1 is FALSE, TRUE
                    'listing_specification_tenant' => fake()->numberBetween(1, 5), // 1 to 5 people allowed
                    'user_id' => $foreign_key->random(),
//                    'created_at' => fake()->dateTimeBetween('1970-01-01 01:01:01', $date_time_max),
//                    'updated_at' => $date_time_max,
                    'created_at' => fake()->dateTimeBetween('-20 years ', '-10 years'),
                    'updated_at' => fake()->dateTimeBetween('-5 years ', '-2 years'),
                ];
                $i++;
            }
        })
            ->chunk(1000)
            ->each(function ($listings) {
                Listing::insert($listings->toArray());
            });
    }
}
