<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanmasukController extends Controller
{
    public function index(Request $request)
    {
        $kategoris = $request->kategori_id;
        $produks = Produk::get();
        return view('owner.laporan-masuk.index', compact('produks'));
    }

    public function show($id)
    {
        $produk = Produk::where('id', $id)->first();

        return view('owner.laporan-masuk.show', compact('produk'));
    }

}