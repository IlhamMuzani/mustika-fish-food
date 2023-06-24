<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;

class LaporantransaksiController extends Controller
{
    public function index(Request $request)
    {
        $transaksis = Transaksi::get();
        return view('owner.laporan-transaksi.index', compact('transaksis'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        $detail_transaksis = DetailTransaksi::where('transaksi_id', $id)->get();

        return view('owner.laporan-transaksi.show', compact('transaksi', 'detail_transaksis'));
    }
}