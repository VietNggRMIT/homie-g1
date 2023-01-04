<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $vietnam_provinces = ['Ha Noi','Ha Giang','Cao Bang','Bac Kan','Tuyen Quang','Lao Cai','Dien Bien','Lai Chau','Son La','Yen Bai','Hoa Binh','Thai Nguyen','Lang Son','Quang Ninh','Bac Giang','Phu Tho','Vinh Phuc','Bac Ninh','Hai Duong','Hai Phong','Hung Yen','Thai Binh','Ha Nam','Nam Dinh','Ninh Binh','Thanh Hoa','Nghe An','Ha Tinh','Quang Binh','Quang Tri','Thua Thien Hue','Da Nang','Quang Nam','Quang Ngai','Binh Dinh','Phu Yen','Khanh Hoa','Ninh Thuan','Binh Thuan','Kon Tum','Gia Lai','Dak Lak','Dak Nong','Lam Dong','Binh Phuoc','Tay Ninh','Binh Duong','Dong Nai','Ba Ria - Vung Tau','Ho Chi Minh','Long An','Tien Giang','Ben Tre','Tra Vinh','Vinh Long','Dong Thap','An Giang','Kien Giang','Can Tho','Hau Giang','Soc Trang','Bac Lieu','Ca Mau'];

//        The world is from -90-90; -180-180. Vietnam is from 8-23, 104-110
//        $x = fake()->latitude($min = 20, $max = 21); // "77.147489 86.211205"
//        $y = fake()->longitude($min = 104, $max = 106);
        $date_max = fake()->date();
        $time_max = fake()->time();

        return [
//            'listing_name' => fake()->realTextBetween(10, 100, 2), // generate 10 to 100 English characters; indexSize 1->5, with 5 to get most accurate word generation
            'listing_name' => fake()->words(5, true), // === sentence(4);
//            'listing_description' => fake()->optional()->realTextBetween(10, 500, 5),
            'listing_description' => fake()->optional()->paragraphs(3, true),
            'listing_address_subdivision_1' => fake()->randomElement($vietnam_provinces), // fake()->city()
            'listing_address_subdivision_2' => fake()->optional()->streetAddress(),
            'listing_address_subdivision_3' => fake()->optional()->streetName(),
            'listing_address_latitude' => fake()->latitude($min = 20, $max = 21),
            'listing_address_longitude' => fake()->longitude($min = 104, $max = 106),
//            'listing_address_coordinate' => new Point($x,  $y, 4326),
//            'listing_address_coordinate' => DB::raw("ST_PointFromText('POINT(" . $y . " " . $x . ")')"),
//            'listing_address_coordinate' => DB::raw("ST_GeometryFromText('POINT(54.8765696 -2.9261824)')"),
//            'listing_image' => fake()->optional()->imageUrl(640, 480, 'listing', true, 'image', true),
            'listing_price' => fake()->numberBetween(500, 20000).'000', // 500k->20m VND
//            'listing_rating' => fake()->optional()->numberBetween(1,5), // 1-5 stars
            'listing_available' => fake()->numberBetween(0,1), // 0,1 is FALSE, TRUE
            'listing_specification_bathroom' => fake()->numberBetween(0, 3), // 0-3 bathrooms
            'listing_specification_bedroom' => fake()->numberBetween(0, 4), // 0-4 bedrooms
            'listing_specification_size' => fake()->numberBetween(5, 120), // 5-120 m2
            'listing_specification_owner' => fake()->numberBetween(0, 1), // 0,1 is FALSE, TRUE
            'listing_specification_tenant' => fake()->numberBetween(1, 5), // 1 to 5 people allowed
            'created_at' => fake()->dateTimeBetween('1970-01-01 01:01:01', $date_max." ".$time_max),
            'updated_at' => $date_max." ".$time_max,
            'user_id' => User::factory(),
        ];
    }
}
