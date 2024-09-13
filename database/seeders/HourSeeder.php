<?php

namespace Database\Seeders;

use App\Models\Hour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HourSeeder extends Seeder
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
            Hour::create([
                'start' => $value['start'],
                'end' => $value['end'],
                'start_period' => $value['start_period'],
                'end_period' => $value['end_period'],
                'place_id' => $value['place_id'],
                'room_id' => $value['room_id'],
                'created_by' => $value['created_by']
            ]);
        }
    }

    private function data(): array
    {
        return [
            // dUABİ
            /* Psychiatric Hour List */
            ['start' => '01:00:00', 'end' => '02:00:00', 'start_period' => 'AM', 'end_period' => 'AM', 'place_id' => 1, 'room_id' => 1, 'created_by' => 1],
            ['start' => '10:30:00', 'end' => '11:30:00', 'start_period' => 'AM', 'end_period' => 'AM', 'place_id' => 1, 'room_id' => 1, 'created_by' => 1],
            ['start' => '12:00:00', 'end' => '13:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 1, 'created_by' => 1],
            ['start' => '14:00:00', 'end' => '15:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 1, 'created_by' => 1],
            ['start' => '15:30:00', 'end' => '16:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 1, 'created_by' => 1],
            ['start' => '17:00:00', 'end' => '18:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 1, 'created_by' => 1],
            ['start' => '18:30:00', 'end' => '19:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 1, 'created_by' => 1],
            ['start' => '20:00:00', 'end' => '21:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 1, 'created_by' => 1],
            ['start' => '21:30:00', 'end' => '22:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 1, 'created_by' => 1],
            ['start' => '23:00:00', 'end' => '00:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 1, 'created_by' => 1],

            /* Exorcism Hour List */
            ['start' => '10:30:00', 'end' => '11:30:00', 'start_period' => 'AM', 'end_period' => 'AM', 'place_id' => 1, 'room_id' => 2, 'created_by' => 1],
            ['start' => '12:00:00', 'end' => '13:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 2, 'created_by' => 1],
            ['start' => '14:00:00', 'end' => '15:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 2, 'created_by' => 1],
            ['start' => '15:30:00', 'end' => '16:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 2, 'created_by' => 1],
            ['start' => '17:00:00', 'end' => '18:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 2, 'created_by' => 1],
            ['start' => '18:30:00', 'end' => '19:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 2, 'created_by' => 1],
            ['start' => '20:00:00', 'end' => '21:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 2, 'created_by' => 1],
            ['start' => '21:30:00', 'end' => '22:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 2, 'created_by' => 1],
            ['start' => '23:00:00', 'end' => '00:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 2, 'created_by' => 1],
            ['start' => '00:00:00', 'end' => '01:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 2, 'created_by' => 1],

            /* Torture 333 Hour List */
            ['start' => '10:30:00', 'end' => '11:30:00', 'start_period' => 'AM', 'end_period' => 'AM', 'place_id' => 1, 'room_id' => 3, 'created_by' => 1],
            ['start' => '12:00:00', 'end' => '13:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 3, 'created_by' => 1],
            ['start' => '14:00:00', 'end' => '15:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 3, 'created_by' => 1],
            ['start' => '15:30:00', 'end' => '16:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 3, 'created_by' => 1],
            ['start' => '17:00:00', 'end' => '18:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 3, 'created_by' => 1],
            ['start' => '18:30:00', 'end' => '19:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 3, 'created_by' => 1],
            ['start' => '20:00:00', 'end' => '21:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 3, 'created_by' => 1],
            ['start' => '21:30:00', 'end' => '22:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 3, 'created_by' => 1],
            ['start' => '23:00:00', 'end' => '00:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 3, 'created_by' => 1],
            ['start' => '00:00:00', 'end' => '01:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 3, 'created_by' => 1],

            /* Chaos Hour List */
            ['start' => '10:30:00', 'end' => '11:30:00', 'start_period' => 'AM', 'end_period' => 'AM', 'place_id' => 1, 'room_id' => 4, 'created_by' => 1],
            ['start' => '12:00:00', 'end' => '13:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 4, 'created_by' => 1],
            ['start' => '14:00:00', 'end' => '15:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 4, 'created_by' => 1],
            ['start' => '15:30:00', 'end' => '16:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 4, 'created_by' => 1],
            ['start' => '17:00:00', 'end' => '18:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 4, 'created_by' => 1],
            ['start' => '18:30:00', 'end' => '19:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 4, 'created_by' => 1],
            ['start' => '20:00:00', 'end' => '21:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 4, 'created_by' => 1],
            ['start' => '21:30:00', 'end' => '22:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 4, 'created_by' => 1],
            ['start' => '23:00:00', 'end' => '00:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 4, 'created_by' => 1],
            ['start' => '00:00:00', 'end' => '01:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 1, 'room_id' => 4, 'created_by' => 1],


            // ABUDHABİ HOURS
            /* Hotel 666 Hour List */
            ['start' => '01:00:00', 'end' => '02:00:00', 'start_period' => 'AM', 'end_period' => 'AM', 'place_id' => 2, 'room_id' => 5, 'created_by' => 1],
            ['start' => '10:00:00', 'end' => '11:00:00', 'start_period' => 'AM', 'end_period' => 'AM', 'place_id' => 2, 'room_id' => 5, 'created_by' => 1],
            ['start' => '11:30:00', 'end' => '12:30:00', 'start_period' => 'AM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 5, 'created_by' => 1],
            ['start' => '13:00:00', 'end' => '14:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 5, 'created_by' => 1],
            ['start' => '14:30:00', 'end' => '15:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 5, 'created_by' => 1],
            ['start' => '16:00:00', 'end' => '17:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 5, 'created_by' => 1],
            ['start' => '17:30:00', 'end' => '18:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 5, 'created_by' => 1],
            ['start' => '19:00:00', 'end' => '20:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 5, 'created_by' => 1],
            ['start' => '20:30:00', 'end' => '21:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 5, 'created_by' => 1],
            ['start' => '22:00:00', 'end' => '23:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 5, 'created_by' => 1],

            /* Exorcism Hour List */
            ['start' => '23:30:00', 'end' => '00:30:00', 'start_period' => 'PM', 'end_period' => 'AM', 'place_id' => 2, 'room_id' => 6, 'created_by' => 1],
            ['start' => '01:00:00', 'end' => '02:00:00', 'start_period' => 'AM', 'end_period' => 'AM', 'place_id' => 2, 'room_id' => 6, 'created_by' => 1],
            ['start' => '10:30:00', 'end' => '11:30:00', 'start_period' => 'AM', 'end_period' => 'AM', 'place_id' => 2, 'room_id' => 6, 'created_by' => 1],
            ['start' => '12:00:00', 'end' => '13:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 6, 'created_by' => 1],
            ['start' => '13:00:00', 'end' => '14:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 6, 'created_by' => 1],
            ['start' => '14:30:00', 'end' => '15:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 6, 'created_by' => 1],
            ['start' => '16:00:00', 'end' => '17:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 6, 'created_by' => 1],
            ['start' => '17:30:00', 'end' => '18:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 6, 'created_by' => 1],
            ['start' => '19:00:00', 'end' => '20:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 6, 'created_by' => 1],
            ['start' => '20:30:00', 'end' => '21:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 6, 'created_by' => 1],

            /* The Circus Hour List */
            ['start' => '01:00:00', 'end' => '02:00:00', 'start_period' => 'AM', 'end_period' => 'AM', 'place_id' => 2, 'room_id' => 7, 'created_by' => 1],
            ['start' => '10:00:00', 'end' => '11:00:00', 'start_period' => 'AM', 'end_period' => 'AM', 'place_id' => 2, 'room_id' => 7, 'created_by' => 1],
            ['start' => '11:30:00', 'end' => '12:30:00', 'start_period' => 'AM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 7, 'created_by' => 1],
            ['start' => '13:00:00', 'end' => '14:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 7, 'created_by' => 1],
            ['start' => '14:30:00', 'end' => '15:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 7, 'created_by' => 1],
            ['start' => '16:00:00', 'end' => '17:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 7, 'created_by' => 1],
            ['start' => '17:30:00', 'end' => '18:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 7, 'created_by' => 1],
            ['start' => '19:00:00', 'end' => '20:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 7, 'created_by' => 1],
            ['start' => '20:30:00', 'end' => '21:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 7, 'created_by' => 1],
            ['start' => '22:00:00', 'end' => '23:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 7, 'created_by' => 1],

            /* Psychiatric Hour List */
            ['start' => '23:30:00', 'end' => '00:30:00', 'start_period' => 'PM', 'end_period' => 'AM', 'place_id' => 2, 'room_id' => 8, 'created_by' => 1],
            ['start' => '01:00:00', 'end' => '02:00:00', 'start_period' => 'AM', 'end_period' => 'AM', 'place_id' => 2, 'room_id' => 8, 'created_by' => 1],
            ['start' => '10:30:00', 'end' => '11:30:00', 'start_period' => 'AM', 'end_period' => 'AM', 'place_id' => 2, 'room_id' => 8, 'created_by' => 1],
            ['start' => '12:00:00', 'end' => '13:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 8, 'created_by' => 1],
            ['start' => '13:00:00', 'end' => '14:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 8, 'created_by' => 1],
            ['start' => '14:30:00', 'end' => '15:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 8, 'created_by' => 1],
            ['start' => '16:00:00', 'end' => '17:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 8, 'created_by' => 1],
            ['start' => '17:30:00', 'end' => '18:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 8, 'created_by' => 1],
            ['start' => '19:00:00', 'end' => '20:00:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 8, 'created_by' => 1],
            ['start' => '20:30:00', 'end' => '21:30:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 8, 'created_by' => 1],

            /* Dungeon Hour List */
            ['start' => '00:00:00', 'end' => '00:40:00', 'start_period' => 'AM', 'end_period' => 'AM', 'place_id' => 2, 'room_id' => 9, 'created_by' => 1],
            ['start' => '01:00:00', 'end' => '01:40:00', 'start_period' => 'AM', 'end_period' => 'AM', 'place_id' => 2, 'room_id' => 9, 'created_by' => 1],
            ['start' => '10:00:00', 'end' => '10:40:00', 'start_period' => 'AM', 'end_period' => 'AM', 'place_id' => 2, 'room_id' => 9, 'created_by' => 1],
            ['start' => '11:00:00', 'end' => '11:40:00', 'start_period' => 'AM', 'end_period' => 'AM', 'place_id' => 2, 'room_id' => 9, 'created_by' => 1],
            ['start' => '12:00:00', 'end' => '12:40:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 9, 'created_by' => 1],
            ['start' => '13:00:00', 'end' => '13:40:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 9, 'created_by' => 1],
            ['start' => '14:00:00', 'end' => '14:40:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 9, 'created_by' => 1],
            ['start' => '15:00:00', 'end' => '15:40:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 9, 'created_by' => 1],
            ['start' => '16:00:00', 'end' => '16:40:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 9, 'created_by' => 1],
            ['start' => '17:00:00', 'end' => '17:40:00', 'start_period' => 'PM', 'end_period' => 'PM', 'place_id' => 2, 'room_id' => 9, 'created_by' => 1],

        ];
    }
}
