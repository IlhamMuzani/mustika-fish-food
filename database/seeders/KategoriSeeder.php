<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoris = [
            [
                'nama' => 'Ikan Hias',
                'jenis_id' => '1'
            ],
            [
                'nama' => 'Ikan Konsumsi',
                'jenis_id' => '1'
            ],
            [
                'nama' => 'Pakan Alami',
                'jenis_id' => '2'
            ],
            [
                'nama' => 'Pakan Buatan',
                'jenis_id' => '2'
            ],
        ];

        Kategori::insert($kategoris);
    }
}
