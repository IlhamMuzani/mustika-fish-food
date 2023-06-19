<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'nama' => 'Ikan koi',
                'suplayer_id' => '1',
                'kode_product' => 'PRODUCT/1/17 June 2023',
                'kategori' => 'ikan',
                'jenis' => 'ikan hias',
                'harga' => '20000',
                'stok' => '10',
                'gambar' => 'product/ikankoi.jpg',
            ],
            [
                'nama' => 'Ikan cupang',
                'suplayer_id' => '2',
                'kode_product' => 'PRODUCT/2/17 June 2023',
                'kategori' => 'ikan',
                'jenis' => 'ikan hias',
                'harga' => '20000',
                'stok' => '10',
                'gambar' => 'product/ikancupang.jpg',
            ],
            [
                'nama' => 'Ikan chana',
                'suplayer_id' => '3',
                'kode_product' => 'PRODUCT/3/17 June 2023',
                'kategori' => 'ikan',
                'jenis' => 'ikan hias',
                'harga' => '20000',
                'stok' => '10',
                'gambar' => 'product/ikanchana.jpg',
            ],
            [
                'nama' => 'Ikan mas',
                'suplayer_id' => '2',
                'kode_product' => 'PRODUCT/4/17 June 2023',
                'kategori' => 'ikan',
                'jenis' => 'ikan hias',
                'harga' => '150000',
                'stok' => '10',
                'gambar' => 'product/ikanmas.jpg',
            ],
            [
                'nama' => 'Pakan akari',
                'suplayer_id' => '2',
                'kode_product' => 'PRODUCT/5/17 June 2023',
                'kategori' => 'pakan',
                'jenis' => 'pakan buatan',
                'harga' => '40000',
                'stok' => '10',
                'gambar' => 'product/akari.jpg',
            ],
            [
                'nama' => 'Pakan sankoi',
                'suplayer_id' => '1',
                'kode_product' => 'PRODUCT/6/17 June 2023',
                'kategori' => 'pakan',
                'jenis' => 'pakan buatan',
                'harga' => '20000',
                'stok' => '10',
                'gambar' => 'product/sankoi.jpg',
            ],
            [
                'nama' => 'Pakan sakura',
                'suplayer_id' => '3',
                'kode_product' => 'PRODUCT/7/18 June 2023',
                'kategori' => 'pakan',
                'jenis' => 'pakan buatan',
                'harga' => '150000',
                'stok' => '10',
                'gambar' => 'product/sakura.jpg',
            ],
            [
                'nama' => 'Pakan pelet cupang',
                'suplayer_id' => '3',
                'kode_product' => 'PRODUCT/8/18 June 2023',
                'kategori' => 'pakan',
                'jenis' => 'pakan buatan',
                'harga' => '150000',
                'stok' => '10',
                'gambar' => 'product/peletcupang.jpg',
            ],
            [
                'nama' => 'Pakan super cupang',
                'suplayer_id' => '3',
                'kode_product' => 'PRODUCT/9/18 June 2023',
                'kategori' => 'pakan',
                'jenis' => 'pakan buatan',
                'harga' => '140000',
                'stok' => '10',
                'gambar' => 'product/supercupang.jpg',
            ],
            [
                'nama' => 'Ikan bawal',
                'suplayer_id' => '3',
                'kategori' => 'ikan',
                'kode_product' => 'PRODUCT/10/18 June 2023',
                'jenis' => 'ikan konsumsi',
                'harga' => '30000',
                'stok' => '10',
                'gambar' => 'product/ikanbawal.jpg',
            ],
            [
                'nama' => 'Ikan kakap',
                'suplayer_id' => '2',
                'kode_product' => 'PRODUCT/11/18 June 2023',
                'kategori' => 'ikan',
                'jenis' => 'ikan konsumsi',
                'harga' => '100000',
                'stok' => '10',
                'gambar' => 'product/ikankakap.jpg',
            ],
            [
                'nama' => 'Ikan lele',
                'suplayer_id' => '2',
                'kode_product' => 'PRODUCT/12/18 June 2023',
                'kategori' => 'ikan',
                'jenis' => 'ikan konsumsi',
                'harga' => '60000',
                'stok' => '10',
                'gambar' => 'product/ikanlele.jpg',
            ],
            [
                'nama' => 'Pakan cacing',
                'suplayer_id' => '1',
                'kode_product' => 'PRODUCT/13/18 June 2023',
                'kategori' => 'pakan',
                'jenis' => 'pakan alami',
                'harga' => '20000',
                'stok' => '10',
                'gambar' => 'product/cacing.jpg',
            ],
            [
                'nama' => 'Pakan kutu air',
                'suplayer_id' => '1',
                'kategori' => 'pakan',
                'kode_product' => 'PRODUCT/14/18 June 2023',
                'jenis' => 'pakan alami',
                'harga' => '15000',
                'stok' => '10',
                'gambar' => 'product/kutuair.jpg',
            ],
            [
                'nama' => 'Pakan ampas kelapa',
                'suplayer_id' => '1',
                'kode_product' => 'PRODUCT/15/18 June 2023',
                'kategori' => 'pakan',
                'jenis' => 'pakan alami',
                'harga' => '10000',
                'stok' => '10',
                'gambar' => 'product/ampaskelapa.jpg',
            ],
        ];
        Product::insert($products);
    }
}