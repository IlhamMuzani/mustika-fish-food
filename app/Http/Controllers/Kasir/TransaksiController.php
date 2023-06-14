<?php

namespace App\Http\Controllers\Kasir;

use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::paginate(3);
        return view('kasir/transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $products = Product::all();
        return view('kasir/transaksi.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama_pembeli' => 'required',
                'kategori_produk' => 'required',
                'product_id' => 'required',
                'tanggal' => 'required',
                'jumlah_jual' => 'required',
                'harga_jual' => 'required'
            ],
            [
                'nama_pembeli.required' => 'Nama pembeli tidak boleh kosong !',
                'kategori_produk.required' => 'Pilih kategori produk !',
                'product_id.required' => 'Pilih nama produk !',
                'tanggal.required' => 'Tanggal tidak boleh kosong !',
                'jumlah_jual.required' => 'jumlah pembeli tidak boleh kosong !',
                'harga_jual.required' => 'Harga tidak boleh kosong !',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('status', $error);
        }


        Transaksi::create($request->all());

        return redirect('kasir/transaksi')->with('status', 'Berhasil menambahkan transaksi');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        return redirect('kasir/transaksi')->with('status', 'Berhasil menghapus transaksi');
    }
}