<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'listing_name' => fake()->words(4, true), // === sentence(4);
//            'listing_name' => fake()->realTextBetween(3, 30, 5), // generate 3 to 30 English characters; indexSize 1->5, I choose 5 to get most accurate word generation
            'listing_description' => fake()->optional()->paragraphs(3, true),
//            'listing_address_subdivision_1' => fake()->city(),
            'listing_address_subdivision_1' => fake()->randomElement($vietnam_provinces),
            'listing_address_subdivision_2' => fake()->optional()->streetAddress(),
//            'listing_image' => fake()->optional()->imageUrl(640, 480, 'listing', true, 'image', true),
            'listing_price' => fake()->numberBetween(500, 20000).'000', // 500k->2m VND
            'listing_rating' => fake()->optional()->numberBetween(1,5), // 1-5 stars
            'listing_available' => fake()->numberBetween(0,1), // 0 is FALSE, 1 is TRUE
//            'created_at' => now(),
//            'updated_at' => now(),

            'user_id' => User::factory(),
        ];
    }
}
