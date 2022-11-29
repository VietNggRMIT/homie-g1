<?php
//
//namespace Database\Factories;
//
//use Illuminate\Database\Eloquent\Factories\Factory;
//use Illuminate\Support\Str;
//
///**
// * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
// */
//class UserFactory extends Factory
//{
//    /**
//     * Define the model's default state.
//     *
//     * @return array<string, mixed>
//     */
//    public function definition()
//    {
//        return [
//            'name' => fake()->name(),
//            'email' => fake()->unique()->safeEmail(),
//            'email_verified_at' => now(),
//            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//            'remember_token' => Str::random(10),
//        ];
//    }
//
//    /**
//     * Indicate that the model's email address should be unverified.
//     *
//     * @return static
//     */
//    public function unverified()
//    {
//        return $this->state(fn (array $attributes) => [
//            'email_verified_at' => null,
//        ]);
//    }
//}


namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
//            $table->string('user_email_address')->unique();
//            $table->string('user_phone_number')->unique();
//            $table->string('user_real_name');
//            $table->string('user_password');
//            $table->text('user_description');
//            $table->timestamps();

//            'name' => fake()->name(),
//            'email' => fake()->unique()->safeEmail(),
//            'email_verified_at' => now(),
//            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//            'remember_token' => Str::random(10),

            'user_email_address' => fake()->freeEmail(),
            'user_phone_number' => fake()->e164PhoneNumber(),
            'user_password' => fake()->password(),
            'user_real_name' => fake()->name(),
            'user_image_path' => 'user_image_path_' . rand(1, 3) .'.jpg',
            'user_description' => fake()->paragraphs(2, true)
        ];
    }
}
