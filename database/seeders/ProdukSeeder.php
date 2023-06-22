<?php

namespace Database\Seeders;

use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produks = [
            [
                'nama' => 'Ikan Koi',
                'kategori_id' => '1',
                'supplier_id' => '1',
                'harga' => '20000',
                'stok' => '10',
                'gambar' => 'produk/ikankoi.jpg',
            ],
            [
                'nama' => 'Pakan Sankoi',
                'kategori_id' => '4',
                'supplier_id' => '1',
                'harga' => '20000',
                'stok' => '10',
                'gambar' => 'produk/sankoi.jpg',
            ],
            [
                'nama' => 'Pakan Cacing',
                'kategori_id' => '3',
                'supplier_id' => '1',
                'harga' => '20000',
                'stok' => '10',
                'gambar' => 'produk/cacing.jpg',
            ],
            [
                'nama' => 'Pakan Kutu Air',
                'kategori_id' => '3',
                'supplier_id' => '1',
                'harga' => '15000',
                'stok' => '10',
                'gambar' => 'produk/kutuair.jpg',
            ],
            [
                'nama' => 'Pakan Ampas Kelapa',
                'kategori_id' => '3',
                'supplier_id' => '1',
                'harga' => '10000',
                'stok' => '10',
                'gambar' => 'produk/ampaskelapa.jpg',
            ],
            [
                'nama' => 'Ikan Cupang',
                'kategori_id' => '1',
                'supplier_id' => '2',
                'harga' => '20000',
                'stok' => '10',
                'gambar' => 'produk/ikancupang.jpg',
            ],
            [
                'nama' => 'Ikan Mas',
                'kategori_id' => '1',
                'supplier_id' => '2',
                'harga' => '150000',
                'stok' => '10',
                'gambar' => 'produk/ikanmas.jpg',
            ],
            [
                'nama' => 'Pakan Akari',
                'kategori_id' => '4',
                'supplier_id' => '2',
                'harga' => '40000',
                'stok' => '10',
                'gambar' => 'produk/akari.jpg',
            ],
            [
                'nama' => 'Ikan Kakap',
                'kategori_id' => '2',
                'supplier_id' => '2',
                'harga' => '100000',
                'stok' => '10',
                'gambar' => 'produk/ikankakap.jpg',
            ],
            [
                'nama' => 'Ikan Lele',
                'kategori_id' => '2',
                'supplier_id' => '2',
                'harga' => '60000',
                'stok' => '10',
                'gambar' => 'produk/ikanlele.jpg',
            ],
            [
                'nama' => 'Ikan Chana',
                'kategori_id' => '1',
                'supplier_id' => '3',
                'harga' => '20000',
                'stok' => '10',
                'gambar' => 'produk/ikanchana.jpg',
            ],
            [
                'nama' => 'Pakan Sakura',
                'kategori_id' => '4',
                'supplier_id' => '3',
                'harga' => '150000',
                'stok' => '10',
                'gambar' => 'produk/sakura.jpg',
            ],
            [
                'nama' => 'Pakan Pelet Cupang',
                'kategori_id' => '4',
                'supplier_id' => '3',
                'harga' => '150000',
                'stok' => '10',
                'gambar' => 'produk/peletcupang.jpg',
            ],
            [
                'nama' => 'Pakan Super Cupang',
                'kategori_id' => '4',
                'supplier_id' => '3',
                'harga' => '140000',
                'stok' => '10',
                'gambar' => 'produk/supercupang.jpg',
            ],
            [
                'nama' => 'Ikan Bawal',
                'kategori_id' => '2',
                'supplier_id' => '3',
                'harga' => '30000',
                'stok' => '10',
                'gambar' => 'produk/ikanbawal.jpg',
            ],
        ];

        foreach ($produks as $produk) {
            Produk::create([
                'kode' => $this->kode($produk['kategori_id'], $produk['supplier_id']),
                'nama' => $produk['nama'],
                'kategori_id' => $produk['kategori_id'],
                'supplier_id' => $produk['supplier_id'],
                'harga' => $produk['harga'],
                'stok' => $produk['stok'],
                'gambar' => $produk['gambar'],
            ]);
        }
    }

    public function kode($kategori_id, $supplier_id)
    {
        $produks = Produk::where([
            ['kategori_id', $kategori_id],
            ['supplier_id', $supplier_id]
        ])->get();
        if (count($produks) > 0) {
            $count = count($produks) + 1;
            $num = sprintf("%03s", $count);
        } else {
            $num = "001";
        }

        $kode_kategori = sprintf("%02s", $kategori_id);
        $kode_supplier = sprintf("%02s", $supplier_id);
        $kode = $kode_kategori . $kode_supplier . $num;

        return $kode;
    }
}
