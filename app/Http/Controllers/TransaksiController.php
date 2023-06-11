<?php

namespace App\Http\Controllers;

use App\Models\Ikan;
use App\Models\Pakan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::paginate(3);
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $ikans = Ikan::all();
        $pakans = Pakan::all();
        return view('transaksi.create', compact('ikans','pakans'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'nama_pembeli' => 'required',
            'kategori_produk' => 'required',
            // 'ikan_id' => 'required',
            'tanggal' => 'required',
            'jumlah_jual' => 'required',
            'harga_jual' => 'required'
        ], [
            'nama_pembeli.required' => 'Nama pembeli tidak boleh kosong !',
            // 'ikan_id.required' => 'Nama produk tidak boleh kosong !',
            'kategori_produk.required' => 'Nama pembeli tidak boleh kosong !',
            'tanggal.required' => 'Tanggal tidak boleh kosong !',
            'jumlah_jual.required' => 'jumlah pembeli tidak boleh kosong !',
            'harga_jual.required' => 'Harga tidak boleh kosong !',
        ]);

        if($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('status', $error);
        }
    

        Transaksi::create($request->all());

        return redirect('transaksi')->with('status','Berhasil menambahkan transaksi');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        return redirect('transaksi')->with('status', 'Berhasil menghapus transaksi');
    }
}