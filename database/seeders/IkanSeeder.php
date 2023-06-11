<?php

namespace Database\Seeders;

use App\Models\Ikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IkanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ikans = [
            [
                'nama' => 'Ikan Koi',
                'kategori' => 'Kecil',
                'jenis_ikan' => 'Ikan Hias',
                'stok' => '200',
                'gambar' => 'ikan/ikan.jpg',
            ],
            [
                'nama' => 'Ikan Arwana',
                'kategori' => 'Besar',
                'jenis_ikan' => 'Ikan Hias',
                'stok' => '200',
                'gambar' => 'ikan/ikan.jpg',
            ],
            [
                'nama' => 'Ikan Mas',
                'kategori' => 'Sedang',
                'jenis_ikan' => 'Ikan Hias',
                'stok' => '200',
                'gambar' => 'ikan/ikan.jpg',
            ],
            [
                'nama' => 'Ikan Chana',
                'kategori' => 'Sedang',
                'jenis_ikan' => 'Ikan Hias',
                'stok' => '200',
                'gambar' => 'ikan/ikan.jpg',
            ],
        ];
        Ikan::insert($ikans);

    }
}