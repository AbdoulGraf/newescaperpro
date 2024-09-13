<?php

namespace Database\Seeders;

use App\Models\abudhabi\Comment;
use App\Models\Comment as ModelsComment;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $roomsCount = Room::count();

        // Create 50 dummy comments
        for ($i = 0; $i < 50; $i++) {
            ModelsComment::create([
                'person_name' => $faker->name,
                'placefor' => $faker->city,
                'room_id' => $roomsCount ? Room::inRandomOrder()->first()->id : null,
                'person_comment' => $faker->sentence,
                'person_image' => $faker->imageUrl(),
                'comment_date' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
