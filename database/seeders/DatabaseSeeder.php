<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesSeeder::class,
            PermissionsSeeder::class,
            UsersSeeder::class,
            PlaceSeeder::class,
            RoomSeeder::class,
            PriceSeeder::class,
            HourSeeder::class,
            BlogTableSeeder::class,
            CommentsTableSeeder::class,
            FAQsTableSeeder::class,
            RequestVideosTableSeeder::class,
            FranchiseFormsSeeder::class,
            SocialMediaSeeder::class,
            SubscribersSeeder::class,
            ContactFormSeeder::class,
            ReservationsSeeder::class,
            PhotosVideosTableSeeder::class
            
        ]);
    }
}
