<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Define the number of records to generate
        $numRecords = 10; // For example, generate 10 records

        // Insert fake data into the social_media table
        for ($i = 0; $i < $numRecords; $i++) {
            SocialMedia::create([
                'platform' => $faker->randomElement(['Twitter', 'Facebook', 'Instagram']),
                'placefor' => $faker->randomElement(['dubai', 'abudhabi']),
                'username' => $faker->userName,
            ]);
        }
    }
}
