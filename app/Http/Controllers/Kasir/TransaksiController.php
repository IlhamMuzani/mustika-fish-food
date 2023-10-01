<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaksi;
use App\Models\Produk;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $transaksis = Transaksi::get();
        return view('kasir.transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $produks = Produk::orderBy('nama')->get();

        return view('kasir.transaksi.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $validasi_pelanggan = Validator::make($request->all(), [
            'nama' => 'required',
        ], [
            'nama.required' => 'Nama pelanggan harus diisi!',
        ]);

        $error_pelanggans = array();

        if ($validasi_pelanggan->fails()) {
            array_push($error_pelanggans, $validasi_pelanggan->errors()->all()[0]);
        }

        $error_pesanans = array();
        $data_pesanans = collect();

        for ($i = 0; $i < count($request->produk); $i++) {
            $validasi_produk = Validator::make($request->all(), [
                'produk.' . $i => 'required',
                'harga.' . $i => 'required',
                'jumlah.' . $i => 'required',
            ]);

            if ($validasi_produk->fails()) {
                array_push($error_pesanans, "Pesanan nomor " . $i + 1 . " belum dilengkapi!");
            }

            $produk = is_null($request->produk[$i]) ? '' : $request->produk[$i];
            $harga = is_null($request->harga[$i]) ? '' : $request->harga[$i];
            $jumlah = is_null($request->jumlah[$i]) ? '' : $request->jumlah[$i];
            $total = is_null($request->total[$i]) ? '' : $request->total[$i];

            $data_pesanans->push(['produk' => $produk, 'harga' => $harga, 'jumlah' => $jumlah, 'total' => $total]);
        }

        if ($error_pelanggans || $error_pesanans) {
            return back()
                ->withInput()
                ->with('error_pelanggans', $error_pelanggans)
                ->with('error_pesanans', $error_pesanans)
                ->with('data_pesanans', $data_pesanans);
        }

        $transaksi = Transaksi::create([
            'kode' => $this->kode(),
            'nama' => $request->nama
        ]);

        if ($transaksi) {
            foreach ($data_pesanans as $data_pesanan) {
                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'produk_id' => $data_pesanan['produk'],
                    'jumlah' => $data_pesanan['jumlah'],
                    'total' => $data_pesanan['total'],
                ]);
            }

            foreach ($data_pesanans as $data_pesanan) {
                $produk = Produk::where('id', $data_pesanan['produk'])->first();
                $stok = $produk->stok - $data_pesanan['jumlah'];
                Produk::where('id', $data_pesanan['produk'])->update([
                    'stok' => $stok,
                ]);
            }
        }

        return redirect('kasir/transaksi')->with('success', 'Berhasil menambahkan Transaksi');
    }

    public function show($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        $detail_transaksis = DetailTransaksi::where('transaksi_id', $id)->get();

        return view('kasir.transaksi.show', compact('transaksi', 'detail_transaksis'));
    }

    public function kode()
    {
        $now = Carbon::now();
        $transaksis = Transaksi::whereDate('created_at', $now->format('Y-m-d'))->get();
        if (count($transaksis) > 0) {
            $count = count($transaksis) + 1;
            $num = sprintf("%03s", $count);
        } else {
            $num = "001";
        }

        $date = $now->format('ymd');
        $kode = $date . $num;

        return $kode;
    }

    public function harga($id)
    {
        $produk = Produk::where('id', $id)->first();

        return json_decode($produk);
    }

    // public function destroy($id)
    // {
    //     $transaksi = Transaksi::find($id);
    //     $transaksi->delete();
    //     return redirect('kasir/admin')->with('success', 'Berhasil menghapus transaksi');
    // }

    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->detail_transaksis()->delete();
        $transaksi->delete();
        return redirect('kasir/transaksi')->with('success', 'Berhasil menghapus transaksi');
    }
}