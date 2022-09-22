<?php

namespace Database\Seeders;

use App\Models\Reschedule;
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
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(BookingListSeeder::class);
        $this->call(RoomBookingSeeder::class);
        $this->call(RescheduleSeeder::class);
    }
}
