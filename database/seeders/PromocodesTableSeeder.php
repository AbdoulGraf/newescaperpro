<?php

namespace Database\Seeders;

use App\Models\Promocode;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;


class PromocodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Promocode::create([
                'promocode' => strtoupper($faker->unique()->lexify('??????')),
                'discount' => $faker->numberBetween(10, 50), // Assuming discount is a percentage
                'start_date' => Carbon::today()->toDateString(),
                'validity_period' => $faker->numberBetween(30, 365), // Validity period in days
                'store_validity' => $faker->randomElement(['30 days', '60 days', '90 days']),
                'status' => $faker->boolean(70), // 70% chance of being active
            ]);
        }


    }
}
