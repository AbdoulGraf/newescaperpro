<?php

namespace Database\Seeders;

use App\Models\PhotoVideo;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class PhotosVideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        // Get the count of existing rooms
        $roomsCount = Room::count();

        foreach (range(1, 50) as $index) { // Generate 50 photos/videos
            PhotoVideo::create([
                'name' => $faker->sentence,
                'placefor' => $faker->word,
                'room_id' => $roomsCount ? Room::inRandomOrder()->first()->id : null,
                'photos_img' => $faker->boolean ? $faker->imageUrl(640, 480, 'cats', true) : null, // Using cats for photos
                'videos_mp4' => $faker->boolean ? 'https://www.example.com/video.mp4' : null, // Placeholder video URL
            ]);
        }
    }
}
