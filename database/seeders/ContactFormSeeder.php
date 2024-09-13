<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class ContactFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Initialize Faker
        $faker = Faker::create();

        // Create 10 fake contact form submissions
        for ($i = 0; $i < 10; $i++) {
            Contact::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'phone_zone' => $faker->optional()->randomElement(['+1', '+44', '+90']), // Optional random phone zone
                'phone' => $faker->phoneNumber,
                'subject' => $faker->sentence,
                'message' => $faker->paragraph,
                'place_id' => $faker->optional()->randomElement([1, 2, null]), // Optional random place ID or null
                'room_id' => $faker->optional()->randomElement([1, 2, null]), // Optional random room ID or null
            ]);
        }
    }
}
