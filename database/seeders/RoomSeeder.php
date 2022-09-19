<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
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
                'name' => 'Meeting 1',
                'description' => 'ruangan meeting lantai 2',
                'capacity' => 12,
                'photo' => 'storage/room/meeting_1.png',
            ],
            [
                'name' => 'Meeting 2',
                'description' => 'ruangan meeting lantai 2 view pemandangan',
                'capacity' => 8,
                'photo' => 'storage/room/meeting_2.jpg',
            ],
            [
                'name' => 'Meeting 3',
                'description' => 'ruangan meeting santai lantai 3',
                'capacity' => 25,
                'photo' => 'storage/room/meeting_3.jpg',
            ],
            [
                'name' => 'Meeting 4',
                'description' => 'ruangan meeting lantai 1',
                'capacity' => 8,
                'photo' => 'storage/room/meeting_4.png',
            ],
            [
                'name' => 'Meeting 5',
                'description' => 'ruangan meeting santai lantai 4',
                'capacity' => 8,
                'photo' => 'storage/room/meeting_5.jpg',
            ],
        ];

        Room::insert($datas);
    }
}
