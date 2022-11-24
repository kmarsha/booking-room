<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'id' => 1,
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('pass'),
                'pass' => 'pass',
                'description' => 'Manajer',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Si Admin 2',
                'username' => 'admin2',
                'email' => 'admin2@gmail.com',
                'password' => bcrypt('pass'),
                'pass' => 'pass',
                'description' => null,
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '3',
                'name' => 'Si User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('pass'),
                'pass' => 'pass',
                'description' => null,
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Zaki',
                'username' => 'zaki',
                'email' => 'zaki@gmail.com',
                'password' => bcrypt('pass'),
                'pass' => 'pass',
                'description' => null,
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Marsha',
                'username' => 'macca',
                'email' => 'marshak@gmail.com',
                'password' => bcrypt('pass'),
                'pass' => 'pass',
                'description' => null,
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        User::insert($datas);
    }
}
