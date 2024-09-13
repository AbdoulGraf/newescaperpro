<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Storyline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class StorylinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $roomsCount = Room::count();

        //data 

        foreach (range(1, 10) as $index) {
            Storyline::create([
                'header' => $faker->word,
                'header_title' => $faker->sentence,
                'storyline_description' => $faker->paragraph,
                'placefor' => $faker->city,
                'room_id' => $roomsCount ? Room::inRandomOrder()->first()->id : null,
            ]);
        }
    }
}
