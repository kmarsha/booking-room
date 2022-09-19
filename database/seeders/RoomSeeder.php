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
                'capacity' => 18,
            ],
            [
                'name' => 'Meeting 2',
                'description' => 'ruangan meeting lantai 2 view pemandangan',
                'capacity' => 12,
            ],
            [
                'name' => 'Meeting 3',
                'description' => 'ruangan meeting santai lantai 3',
                'capacity' => 25,
            ],
            [
                'name' => 'Meeting 4',
                'description' => 'ruangan meeting lantai 1',
                'capacity' => 8,
            ],
            [
                'name' => 'Meeting 5',
                'description' => 'ruangan meeting santai lantai 4',
                'capacity' => 25,
            ],
        ];

        Room::insert($datas);
    }
}
