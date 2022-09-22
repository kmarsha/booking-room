<?php

namespace Database\Seeders;

use App\Models\RoomBooking;
use Illuminate\Database\Seeder;

class RoomBookingSeeder extends Seeder
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
                'user_id' => '3',
                'booking_id' => '1',
                'date' => now()->subDay(2)->format('Y-m-d'),
                'start' => '10:00:00',
                'end' => '12:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_id' => '2',
                'user_id' => '4',
                'booking_id' => '2',
                'date' => now()->subDay(2)->format('Y-m-d'),
                'start' => '14:00:00',
                'end' => '16:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_id' => '5',
                'user_id' => '3',
                'booking_id' => '3',
                'date' => now()->subDay(1)->format('Y-m-d'),
                'start' => '10:00:00',
                'end' => '12:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_id' => '2',
                'user_id' => '3',
                'booking_id' => '4',
                'date' => now()->subDay(1)->format('Y-m-d'),
                'start' => '16:00:00',
                'end' => '18:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_id' => '5',
                'user_id' => '4',
                'booking_id' => '5',
                'date' => now()->format('Y-m-d'),
                'start' => '9:00:00',
                'end' => '12:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_id' => '2',
                'user_id' => '4',
                'booking_id' => '6',
                'date' => now()->format('Y-m-d'),
                'start' => '9:00:00',
                'end' => '12:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        RoomBooking::insert($datas);
    }
}
