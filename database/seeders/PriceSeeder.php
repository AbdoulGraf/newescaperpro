<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->data();

        foreach ($data as $value) {
            Price::create([
                'player' => $value['player'],
                'price' => $value['price'],
                'place_id' => $value['place_id'],
                'room_id' => $value['room_id'],
                'created_by' => $value['created_by']
            ]);
        }
    }

    private function data(): array
    {
        return [

            // DUBAİ
            /* Psychiatric Price List */
            ['player' => 2,  'price' => 220, 'place_id' => 1, 'room_id' => 1, 'created_by' => 1],
            ['player' => 3,  'price' => 200, 'place_id' => 1, 'room_id' => 1, 'created_by' => 1],
            ['player' => 4,  'price' => 190, 'place_id' => 1, 'room_id' => 1, 'created_by' => 1],
            ['player' => 5,  'price' => 180, 'place_id' => 1, 'room_id' => 1, 'created_by' => 1],
            ['player' => 6,  'price' => 170, 'place_id' => 1, 'room_id' => 1, 'created_by' => 1],
            ['player' => 7,  'price' => 160, 'place_id' => 1, 'room_id' => 1, 'created_by' => 1],
            ['player' => 8,  'price' => 160, 'place_id' => 1, 'room_id' => 1, 'created_by' => 1],
            ['player' => 9,  'price' => 160, 'place_id' => 1, 'room_id' => 1, 'created_by' => 1],
            ['player' => 10, 'price' => 160, 'place_id' => 1, 'room_id' => 1, 'created_by' => 1],

            /* Exorcism Price List */
            ['player' => 2,  'price' => 220, 'place_id' => 1, 'room_id' => 2, 'created_by' => 1],
            ['player' => 3,  'price' => 200, 'place_id' => 1, 'room_id' => 2, 'created_by' => 1],
            ['player' => 4,  'price' => 190, 'place_id' => 1, 'room_id' => 2, 'created_by' => 1],
            ['player' => 5,  'price' => 180, 'place_id' => 1, 'room_id' => 2, 'created_by' => 1],
            ['player' => 6,  'price' => 170, 'place_id' => 1, 'room_id' => 2, 'created_by' => 1],
            ['player' => 7,  'price' => 160, 'place_id' => 1, 'room_id' => 2, 'created_by' => 1],
            ['player' => 8,  'price' => 160, 'place_id' => 1, 'room_id' => 2, 'created_by' => 1],
            ['player' => 9,  'price' => 160, 'place_id' => 1, 'room_id' => 2, 'created_by' => 1],
            ['player' => 10, 'price' => 160, 'place_id' => 1, 'room_id' => 2, 'created_by' => 1],

            /* Torture Price List */
            ['player' => 2,  'price' => 220, 'place_id' => 1, 'room_id' => 3, 'created_by' => 1],
            ['player' => 3,  'price' => 200, 'place_id' => 1, 'room_id' => 3, 'created_by' => 1],
            ['player' => 4,  'price' => 190, 'place_id' => 1, 'room_id' => 3, 'created_by' => 1],
            ['player' => 5,  'price' => 180, 'place_id' => 1, 'room_id' => 3, 'created_by' => 1],
            ['player' => 6,  'price' => 170, 'place_id' => 1, 'room_id' => 3, 'created_by' => 1],
            ['player' => 7,  'price' => 160, 'place_id' => 1, 'room_id' => 3, 'created_by' => 1],
            ['player' => 8,  'price' => 160, 'place_id' => 1, 'room_id' => 3, 'created_by' => 1],
            ['player' => 9,  'price' => 160, 'place_id' => 1, 'room_id' => 3, 'created_by' => 1],
            ['player' => 10, 'price' => 160, 'place_id' => 1, 'room_id' => 3, 'created_by' => 1],

            /* Chaos Price List */
            ['player' => 2,  'price' => 220, 'place_id' => 1, 'room_id' => 4, 'created_by' => 1],
            ['player' => 3,  'price' => 200, 'place_id' => 1, 'room_id' => 4, 'created_by' => 1],
            ['player' => 4,  'price' => 190, 'place_id' => 1, 'room_id' => 4, 'created_by' => 1],
            ['player' => 5,  'price' => 180, 'place_id' => 1, 'room_id' => 4, 'created_by' => 1],
            ['player' => 6,  'price' => 170, 'place_id' => 1, 'room_id' => 4, 'created_by' => 1],
            ['player' => 7,  'price' => 160, 'place_id' => 1, 'room_id' => 4, 'created_by' => 1],
            ['player' => 8,  'price' => 160, 'place_id' => 1, 'room_id' => 4, 'created_by' => 1],
            ['player' => 9,  'price' => 160, 'place_id' => 1, 'room_id' => 4, 'created_by' => 1],
            ['player' => 10, 'price' => 160, 'place_id' => 1, 'room_id' => 4, 'created_by' => 1],





            //   Abudhabi
            /* Hotel 666 Price List */
            ['player' => 2,  'price' => 220, 'place_id' => 2, 'room_id' => 5, 'created_by' => 1],
            ['player' => 3,  'price' => 200, 'place_id' => 2, 'room_id' => 5, 'created_by' => 1],
            ['player' => 4,  'price' => 190, 'place_id' => 2, 'room_id' => 5, 'created_by' => 1],
            ['player' => 5,  'price' => 180, 'place_id' => 2, 'room_id' => 5, 'created_by' => 1],
            ['player' => 6,  'price' => 170, 'place_id' => 2, 'room_id' => 5, 'created_by' => 1],
            ['player' => 7,  'price' => 160, 'place_id' => 2, 'room_id' => 5, 'created_by' => 1],
            ['player' => 8,  'price' => 160, 'place_id' => 2, 'room_id' => 5, 'created_by' => 1],
            ['player' => 9,  'price' => 160, 'place_id' => 2, 'room_id' => 5, 'created_by' => 1],
            ['player' => 10, 'price' => 160, 'place_id' => 2, 'room_id' => 5, 'created_by' => 1],

            /* Exorcism Price List */
            ['player' => 2,  'price' => 220, 'place_id' => 2, 'room_id' => 6, 'created_by' => 1],
            ['player' => 3,  'price' => 200, 'place_id' => 2, 'room_id' => 6, 'created_by' => 1],
            ['player' => 4,  'price' => 190, 'place_id' => 2, 'room_id' => 6, 'created_by' => 1],
            ['player' => 5,  'price' => 180, 'place_id' => 2, 'room_id' => 6, 'created_by' => 1],
            ['player' => 6,  'price' => 170, 'place_id' => 2, 'room_id' => 6, 'created_by' => 1],
            ['player' => 7,  'price' => 160, 'place_id' => 2, 'room_id' => 6, 'created_by' => 1],
            ['player' => 8,  'price' => 160, 'place_id' => 2, 'room_id' => 6, 'created_by' => 1],
            ['player' => 9,  'price' => 160, 'place_id' => 2, 'room_id' => 6, 'created_by' => 1],
            ['player' => 10, 'price' => 160, 'place_id' => 2, 'room_id' => 6, 'created_by' => 1],


            /* The Circus Price List */
            ['player' => 2,  'price' => 220, 'place_id' => 2, 'room_id' => 7, 'created_by' => 1],
            ['player' => 3,  'price' => 200, 'place_id' => 2, 'room_id' => 7, 'created_by' => 1],
            ['player' => 4,  'price' => 190, 'place_id' => 2, 'room_id' => 7, 'created_by' => 1],
            ['player' => 5,  'price' => 180, 'place_id' => 2, 'room_id' => 7, 'created_by' => 1],
            ['player' => 6,  'price' => 170, 'place_id' => 2, 'room_id' => 7, 'created_by' => 1],
            ['player' => 7,  'price' => 160, 'place_id' => 2, 'room_id' => 7, 'created_by' => 1],
            ['player' => 8,  'price' => 160, 'place_id' => 2, 'room_id' => 7, 'created_by' => 1],
            ['player' => 9,  'price' => 160, 'place_id' => 2, 'room_id' => 7, 'created_by' => 1],
            ['player' => 10, 'price' => 160, 'place_id' => 2, 'room_id' => 7, 'created_by' => 1],


            /* Psychiatric Price List */
            ['player' => 2,  'price' => 220, 'place_id' => 2, 'room_id' => 8, 'created_by' => 1],
            ['player' => 3,  'price' => 200, 'place_id' => 2, 'room_id' => 8, 'created_by' => 1],
            ['player' => 4,  'price' => 190, 'place_id' => 2, 'room_id' => 8, 'created_by' => 1],
            ['player' => 5,  'price' => 180, 'place_id' => 2, 'room_id' => 8, 'created_by' => 1],
            ['player' => 6,  'price' => 170, 'place_id' => 2, 'room_id' => 8, 'created_by' => 1],
            ['player' => 7,  'price' => 160, 'place_id' => 2, 'room_id' => 8, 'created_by' => 1],
            ['player' => 8,  'price' => 160, 'place_id' => 2, 'room_id' => 8, 'created_by' => 1],
            ['player' => 9,  'price' => 160, 'place_id' => 2, 'room_id' => 8, 'created_by' => 1],
            ['player' => 10, 'price' => 160, 'place_id' => 2, 'room_id' => 8, 'created_by' => 1],


            /* Dungeon Price List */
            ['player' => 2, 'price' => 110, 'place_id' => 2, 'room_id' => 9, 'created_by' => 1],
            ['player' => 3, 'price' => 110, 'place_id' => 2, 'room_id' => 9, 'created_by' => 1],
            ['player' => 4, 'price' => 110, 'place_id' => 2, 'room_id' => 9, 'created_by' => 1],
            ['player' => 5, 'price' => 110, 'place_id' => 2, 'room_id' => 9, 'created_by' => 1],
            ['player' => 6, 'price' => 110, 'place_id' => 2, 'room_id' => 9, 'created_by' => 1],


        ];
    }
}
