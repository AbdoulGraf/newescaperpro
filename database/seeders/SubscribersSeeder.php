<?php

namespace Database\Seeders;

use App\Models\Subscribers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;



class SubscribersSeeder extends Seeder
{

    public function run(): void
    {
        $faker = Faker::create();
        // Create 50 dummy subscribers
        for ($i = 0; $i < 50; $i++) {
            Subscribers::create([
                'email' => $faker->unique()->safeEmail,
            ]);
        }
    }
}
