<?php

namespace Database\Seeders;

use App\Models\abudhabi\Blog as AbudhabiBlog;
use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create 10 dummy posts
        for ($i = 0; $i < 10; $i++) {
            Blog::create([
                'title' => $faker->sentence,
                'placefor' => $faker-> city,
                'content' => $faker->paragraphs(3, true),
                'created_at' => now(), // Set current timestamp as created_at
                'updated_at' => now(), // Set current timestamp as updated_at
            ]);
        }
    }
}
