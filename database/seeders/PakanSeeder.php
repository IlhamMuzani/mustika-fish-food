<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pakan;

class PakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pakans = [
            [
                'nama'=>'pakan A',
                'kategori'=>'ikan B',
                'stok'=> '200',
                'gambar' => 'ikan/pakan.jpg',
            ],
            [
                'nama' => 'pakan B',
                'kategori' => 'ikan F',
                'stok' => '200',
                'gambar' => 'ikan/pakan.jpg',
            ],
            [
                'nama' => 'pakan B',
                'kategori' => 'ikan C',
                'stok' => '200',
                'gambar' => 'ikan/pakan.jpg',
            ],
            [
                'nama' => 'pakan B',
                'kategori' => 'ikan A',
                'stok' => '200',
                'gambar' => 'ikan/pakan.jpg',
            ],
        ];
        Pakan::insert($pakans);
    }
}