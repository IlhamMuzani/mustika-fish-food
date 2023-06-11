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
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'level' => 'admin',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'windi',
                'email' => 'windi@gmail.com',
                'level' => 'owner',
                'password' => bcrypt('windi'),
            ]
        ];
        User::insert($users);
    }
}