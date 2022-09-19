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
                'description' => 'Manajer',
                'role' => 'admin',
            ],
            [
                'id' => 2,
                'name' => 'Si Admin 2',
                'username' => 'admin2',
                'email' => 'admin2@gmail.com',
                'password' => bcrypt('pass'),
                'description' => null,
                'role' => 'admin',
            ],
            [
                'id' => '3',
                'name' => 'Si User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('pass'),
                'description' => null,
                'role' => 'user',
            ],
            [
                'id' => 4,
                'name' => 'Nana',
                'username' => 'nana',
                'email' => '1001nana1313@gmail.com',
                'password' => bcrypt('pass'),
                'description' => null,
                'role' => 'user',
            ],
            [
                'id' => 5,
                'name' => 'Marsha',
                'username' => 'macca',
                'email' => 'marshakordhawerti@gmail.com',
                'password' => bcrypt('pass'),
                'description' => null,
                'role' => 'user',
            ],
        ];

        User::insert($datas);
    }
}
