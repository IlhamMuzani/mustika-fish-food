<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaksi;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transaksis = [
            [
                'nama_pembeli'=>'windi',
                'nama_produk' => 'ikan Mas',
                'kategori_produk'=>'ikan',
                'tanggal' => '11/06/2023',
                'jumlah_jual'=>'10',
                'harga_jual'=>'10000'
            ],
            [
                'nama_pembeli' => 'randi',
                'nama_produk' => 'ikan Chana',
                'kategori_produk' => 'ikan',
                'tanggal' => '11/06/2023',
                'jumlah_jual' => '10',
                'harga_jual' => '10000'
            ],
            [
                'nama_pembeli' => 'sandi',
                'nama_produk' => 'Pur ikan mas',
                'kategori_produk' => 'pakan',
                'tanggal' => '11/06/2023',
                'jumlah_jual' => '10',
                'harga_jual' => '10000'
            ],
        ];
        Transaksi::insert($transaksis);
    }
}