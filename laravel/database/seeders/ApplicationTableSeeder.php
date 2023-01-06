<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\Application;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\LazyCollection;

class ApplicationTableSeeder extends Seeder
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
            $foreign_key = collect(Listing::all()->modelKeys());
            while ($i < 4000) {
                yield $application = [
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
                    'listing_id' => $foreign_key->random(),
                    'created_at' => fake()->dateTimeBetween('-1 year', '-6 months'),
                    'updated_at' => fake()->dateTimeBetween('-1 month', '-1 day'),
                ];
                $i++;
            }
        })
            ->chunk(1000)
            ->each(function ($applications) {
                Application::insert($applications->toArray());
            });
    }
}
