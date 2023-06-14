<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Suplayer;

class SuplayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suplayers = [
            [
                'nama'=>'toko bursa ikan hias',
                'alamat'=> 'Jl. Gunung Sahari 7A No.Timur, Gn. Sahari Utara, Kecamatan Sawah Besar, Kota Jakarta Pusat',
            ],
            [
                'nama' => 'toko perlengkapan ikan',
                'alamat' => 'Jl. Mangga Besar XIII No.15, RT.6/RW.1, Mangga Dua Sel., Kecamatan Sawah Besar, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta'
            ],
            [
                'nama' => 'Toko Ikan Hias Satibiahmad(tibie) 135',
                'alamat'=> 'Jl. Sumenep, RT.11/RW.4, Menteng, Kec. Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10310' 
            ],
        ];
        Suplayer::insert($suplayers);
    }
}