<?php

namespace Database\Seeders;

use App\Models\Jenis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenises = [
            [
                'nama' => 'Ikan'
            ],
            [
                'nama' => 'Pakan'
            ],
        ];

        Jenis::insert($jenises);
    }
}
