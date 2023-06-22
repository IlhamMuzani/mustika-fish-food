<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suppliers = [
            [
                'nama' => 'Toko Bursa Ikan Hias',
                'alamat' => 'Jl. Gunung Sahari 7A No.Timur, Gn. Sahari Utara, Kecamatan Sawah Besar, Kota Jakarta Pusat',
            ],
            [
                'nama' => 'Toko Perlengkapan Ikan',
                'alamat' => 'Jl. Mangga Besar XIII No.15, RT.6/RW.1, Mangga Dua Sel., Kecamatan Sawah Besar, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta'
            ],
            [
                'nama' => 'Toko Ikan Hias Satibiahmad (Tibie) 135',
                'alamat' => 'Jl. Sumenep, RT.11/RW.4, Menteng, Kec. Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10310'
            ],
            [
                'nama' => 'Toko Bursa Ikan Hias',
                'alamat' => 'Jl. Gunung Sahari 7A No.Timur, Gn. Sahari Utara, Kecamatan Sawah Besar, Kota Jakarta Pusat',
            ],
            [
                'nama' => 'Toko Perlengkapan Ikan',
                'alamat' => 'Jl. Mangga Besar XIII No.15, RT.6/RW.1, Mangga Dua Sel., Kecamatan Sawah Besar, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta'
            ],
            [
                'nama' => 'Toko Ikan Hias Satibiahmad (Tibie) 135',
                'alamat' => 'Jl. Sumenep, RT.11/RW.4, Menteng, Kec. Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10310'
            ],
            [
                'nama' => 'Toko Bursa Ikan Hias',
                'alamat' => 'Jl. Gunung Sahari 7A No.Timur, Gn. Sahari Utara, Kecamatan Sawah Besar, Kota Jakarta Pusat',
            ],
            [
                'nama' => 'Toko Perlengkapan Ikan',
                'alamat' => 'Jl. Mangga Besar XIII No.15, RT.6/RW.1, Mangga Dua Sel., Kecamatan Sawah Besar, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta'
            ],
            [
                'nama' => 'Toko Ikan Hias Satibiahmad (Tibie) 135',
                'alamat' => 'Jl. Sumenep, RT.11/RW.4, Menteng, Kec. Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10310'
            ],
            [
                'nama' => 'Toko Bursa Ikan Hias',
                'alamat' => 'Jl. Gunung Sahari 7A No.Timur, Gn. Sahari Utara, Kecamatan Sawah Besar, Kota Jakarta Pusat',
            ],
            [
                'nama' => 'Toko Perlengkapan Ikan',
                'alamat' => 'Jl. Mangga Besar XIII No.15, RT.6/RW.1, Mangga Dua Sel., Kecamatan Sawah Besar, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta'
            ],
            [
                'nama' => 'Toko Ikan Hias Satibiahmad (Tibie) 135',
                'alamat' => 'Jl. Sumenep, RT.11/RW.4, Menteng, Kec. Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10310'
            ],
        ];

        Supplier::insert($suppliers);
    }
}
