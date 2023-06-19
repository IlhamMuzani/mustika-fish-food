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
        $transaksis = Transaksi::all();
        return view('kasir/transaksi.create', compact('products','transaksis'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'kategori_produk' => 'required',
                'product_id' => 'required',
                'tanggal' => 'required',
                'jumlah_jual' => 'required',
                'harga_jual' => 'required'
            ],
            [
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


        $transaksi = Transaksi::where('jumlah_jual', $request->jumlah_jual)->first();
        if (!empty($transaksi)) {
            $id = Transaksi::getId();
            foreach ($id as $value);
            $idlm = $value->id;
            $idbr = $idlm + 1;
            $blt = date('d F Y');

            $kode_transaksi = 'TRANS/' . $idbr . '/' . $blt;

            Transaksi::create(array_merge(
                $request->all(),
                [
                    'kode_transaksi' => $kode_transaksi,
                ]
            ));
        } else {

            $blt = date('d F Y');
            Transaksi::create(array_merge(
                $request->all(),
                [
                    'kode_transaksi' => 'TRANS/' . 1 . '/' . $blt,
                ]
            ));
        }

        $barang = Product::findOrFail($request->product_id);
        $barang->stok -= $request->jumlah_jual;
        $barang->save();

        return redirect('kasir/transaksi')->with('status', 'Berhasil menambahkan transaksi');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        return redirect('kasir/transaksi')->with('status', 'Berhasil menghapus transaksi');
    }
}