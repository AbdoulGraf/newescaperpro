<?php

namespace Database\Seeders;

use App\Models\abudhabi\FAQ;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class FAQsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $roomsCount = Room::count();

        // Create 50 dummy FAQs
        for ($i = 0; $i < 50; $i++) {
            FAQ::create([
                'question' => $faker->sentence,
                'placefor' => $faker->city,
                'room_id' => $roomsCount ? Room::inRandomOrder()->first()->id : null,
                'answer' => $faker->paragraph,
            ]);
        }

    }
}
