<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'nama' => 'admin',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'level' => 'admin',
            ],
            [
                'nama' => 'windi',
                'username' => 'windi',
                'password' => bcrypt('windi'),
                'level' => 'owner',
            ],
            [
                'nama' => 'kasir',
                'username' => 'kasir',
                'password' => bcrypt('kasir'),
                'level' => 'kasir',
            ]
        ];

        User::insert($users);
    }
}
