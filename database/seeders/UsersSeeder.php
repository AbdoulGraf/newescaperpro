<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        User::create([
            'name'              => 'Graf Developer',
            'email'             => 'developer@grafstudios.com.tr',
            'password'          => Hash::make('Graf.2023!'),
            'email_verified_at' => now(),
        ])->assignRole(['Super-Admin']);

        User::create([
            'name'              => 'Admin',
            'email'             => 'admin@black-out.ae',
            'password'          => Hash::make('hJzuR5'),
            'email_verified_at' => now(),
        ])->assignRole(['admin']);

        User::create([
            'name'              => 'Dubai',
            'email'             => 'dubai@black-out.ae',
            'password'          => Hash::make('ts8aTb'),
            'email_verified_at' => now(),
        ])->assignRole(['dubai']);

        User::create([
            'name'              => 'Abu Dhabi',
            'email'             => 'abudhabi@black-out.ae',
            'password'          => Hash::make('bjCT2T'),
            'email_verified_at' => now(),
        ])->assignRole(['abudhabi']);

        User::create([
            'name'              => 'Call Center',
            'email'             => 'callcenter@black-out.ae',
            'password'          => Hash::make('G5jVEb'),
            'email_verified_at' => now(),
        ])->assignRole(['callcenter']);
    }
}
