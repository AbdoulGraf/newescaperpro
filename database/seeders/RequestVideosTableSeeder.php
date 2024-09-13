<?php

namespace Database\Seeders;

use App\Models\abudhabi\RequestVideo;
use App\Models\RequestVideo as ModelsRequestVideo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;


class RequestVideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create 50 dummy request videos
        for ($i = 0; $i < 50; $i++) {
            ModelsRequestVideo::create([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'phoneNumber' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'store' => $faker->optional()->company,
                'room' => $faker->optional()->buildingNumber,
                'date' => $faker->date,
                'time' => $faker->time,
                'video_type' => $faker->randomElement(['Type A', 'Type B', 'Type C']),
                'payment_method' => $faker->randomElement(['Credit Card', 'PayPal', 'Bank Transfer']),
                'address_country' => $faker->country,
                'address_city' => $faker->city,
                'video_description' => $faker->paragraph,
                'status' => $faker->randomElement(['pending', 'approved', 'rejected']),
            ]);
        }
    }
}
