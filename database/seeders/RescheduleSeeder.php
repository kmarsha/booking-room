<?php

namespace Database\Seeders;

use App\Models\Reschedule;
use Illuminate\Database\Seeder;

class RescheduleSeeder extends Seeder
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
                'room_id' => '2',
                'user_id' => '5',
                'booking_id' => '7',
                'reschedule' => null,
                'message' => 'Ruangan Telah dipesan pada waktu yang Anda request. Jadwalkan ulang?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Reschedule::insert($datas);
    }
}
