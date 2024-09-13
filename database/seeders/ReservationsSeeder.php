<?php

namespace Database\Seeders;

use App\Models\ClientInfo;
use App\Models\Hour;
use App\Models\PaymentInfo;
use App\Models\Place;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;


class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Initialize Faker
        $faker = Faker::create();

        $placesCount = Place::count();
        $roomsCount = Room::count();
        $clientInfosCount = ClientInfo::count();
        $paymentInfosCount = PaymentInfo::count();
        $hoursCount = Hour::count();
        $usersCount = User::count();

        foreach (range(1, 20) as $index) {
            $reservation = new Reservation([
                'status' => 1,
                'place_id' => $placesCount ? Place::inRandomOrder()->first()->id : null,
                'room_id' => $roomsCount ? Room::inRandomOrder()->first()->id : null,
                'client_info_id' => $clientInfosCount ? ClientInfo::inRandomOrder()->first()->id : null,
                'payment_info_id' => $paymentInfosCount ? PaymentInfo::inRandomOrder()->first()->id : null,
                'reservation_date' => $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'hour_id' => $hoursCount ? Hour::inRandomOrder()->first()->id : null,
                'players' => $faker->name,
                'payment_method' => $faker->randomElement(['Credit Card', 'Cash', 'PayPal']),
                'promotion_code' => $faker->optional()->randomElement(['PROMO123', 'DISCOUNT456', null]),
                'discount' => $faker->optional()->randomElement(['5%', '10%', null]),
                'comment' => $faker->sentence,
                'created_by' => $usersCount ? User::inRandomOrder()->first()->id : null,
                'updated_by' => $usersCount ? User::inRandomOrder()->first()->id : null,
                'deleted_by' => null,
            ]);

            $reservation->save();
            
        }
    }
}
