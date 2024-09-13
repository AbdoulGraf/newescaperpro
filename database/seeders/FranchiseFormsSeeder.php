<?php

namespace Database\Seeders;

use App\Models\abudhabi\FranchiseForm;
use App\Models\FranchiseForm as ModelsFranchiseForm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class FranchiseFormsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $faker = Faker::create();

        // Create 50 dummy franchise forms
        for ($i = 0; $i < 50; $i++) {
            ModelsFranchiseForm::create([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'phoneNumber' => $faker->phoneNumber,
                'request_franchise' => $faker->sentence,
                'message' => $faker->optional()->paragraph,
            ]);

        }
    }
}
