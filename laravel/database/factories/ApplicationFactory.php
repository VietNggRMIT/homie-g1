<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'application_description' => 'Applicant: '.fake()->name().';
                    Phone: '.fake()->e164PhoneNumber().';
                    Email: '.fake()->freeEmail().';
                    Date of birth: '.fake()->dateTimeBetween('-30 years', '-20 years')->format("Y-m-d").';
                    Expected duration: '.fake()->randomNumber(3, false).';
                    Expected move in date: '.fake()->dateTimeBetween('-2 years', '-1 years')->format("Y-m-d").';
                    Expected payment via: '.fake()->randomElement(['credit card', 'cash', 'bank transfer', 'parents financed', 'student scholarship']).', '.fake()->creditCardNumber().';
                    Vehicle: '.fake()->randomElement(['yes', 'no']).';
                    Pet: '.fake()->randomElement(['yes', 'no']).';
                    Current job: '.fake()->jobTitle().' at '.fake()->company().';
                    Annual income in VND: '.fake()->numberBetween(500, 20000).'000'.';
                    Current address: '.fake()->streetAddress().';
                    Reason for leaving: '.fake()->randomElement(['do not like old place', 'career move', 'lost job', 'temporary business trip']).';
                    Previous landlord phone: '.fake()->e164PhoneNumber().';
                    Evicted: '.fake()->randomElement(['yes', 'no']).';
                    Convicted: '.fake()->randomElement(['yes', 'no']).';',
            'listing_id' => Listing::factory(),
            'created_at' => fake()->dateTimeBetween('-1 year', '-6 months'),
            'updated_at' => fake()->dateTimeBetween('-1 month', '-1 day'),
        ];
    }
}
