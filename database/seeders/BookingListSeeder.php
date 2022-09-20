<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\BookingList;
use Illuminate\Database\Seeder;

class BookingListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'user_id' => 3,
                'room_id' => 2,
                'date' => '2022-9-18',
                'start' => '20:00:00',
                'end' => '23:00:00',
                'need' => 'rapat perusahaan',
                'status' => 'done',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'room_id' => 1,
                'date' => '2022-9-19',
                'start' => '14:00:00',
                'end' => '16:00:00',
                'need' => 'rapat perusahaan',
                'status' => 'done',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'room_id' => 4,
                'date' => '2022-9-20',
                'start' => '12:00:00',
                'end' => '15:00:00',
                'need' => 'rapat perusahaan',
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        BookingList::insert($datas);

        Room::find('4')->update([
            'status' => 'dipesan',,
                'created_at' => now(),
                'updated_at' => now(),
        ]);
    }
}
