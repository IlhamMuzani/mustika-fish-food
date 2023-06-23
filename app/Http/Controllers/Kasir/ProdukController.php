<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::get();
        return view('kasir.produk.index', compact('produks'));
    }
    
    public function show($id)
    {
        $produk = Produk::where('id', $id)->first();

        return view('kasir.produk.show', compact('produk'));
    }

    public function kategori($id)
    {
        $kategoris = Kategori::where('jenis_id', $id)->get();

        return json_decode($kategoris);
    }
}