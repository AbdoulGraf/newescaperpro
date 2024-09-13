<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\VideoPrice::create([
            'title' => 'Sample Video Dubai',
            'description' => 'This is a sample video description for Dubai.',
            'price' => 19.99,
            'placefor' => 'Dubai',
        ]);

        \App\Models\VideoPrice::create([
            'title' => 'Sample Video Abu Dhabi',
            'description' => 'This is a sample video description for Abu Dhabi.',
            'price' => 22.99,
            'placefor' => 'Abu Dhabi',
        ]);
    }
}
