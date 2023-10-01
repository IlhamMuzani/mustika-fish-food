<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Suplayer;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::get();
        return view('admin.produk.index', compact('produks'));
    }

    public function create()
    {
        $jenises = Jenis::all();
        $kategoris = Kategori::all();
        $suppliers = Supplier::all();

        return view('admin.produk.create', compact('jenises', 'kategoris', 'suppliers'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'jenis_id' => 'required',
            'kategori_id' => 'required',
            'supplier_id' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'nama.required' => 'Nama produk tidak boleh kosong!',
            'jenis_id.required' => 'Jenis harus dipilih!',
            'kategori_id.required' => 'Kategori harus dipilih!',
            'supplier_id.required' => 'Supplier harus dipilih!',
            'stok.required' => 'Stok tidak boleh kosong!',
            'harga.required' => 'Harga tidak boleh kosong!',
            'gambar.required' => 'Gambar harus ditambahkan!',
            'gambar.image' => 'Gambar yang dimasukan salah!',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return back()->withInput()->with('error', $errors);
        }

        $gambar = str_replace(' ', '', $request->gambar->getClientOriginalName());
        $namaGambar = 'produk/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
        $request->gambar->storeAs('public/uploads/', $namaGambar);

        Produk::create(array_merge($request->all(), [
            'kode' => $this->kode($request->kategori_id, $request->supplier_id),
            'gambar' => $namaGambar,
        ]));

        return redirect('admin/produk')->with('success', 'Berhasil menambahkan Produk');
    }

    public function show($id)
    {
        $produk = Produk::where('id', $id)->first();

        return view('admin.produk.show', compact('produk'));
    }

    public function edit($id)
    {
        $jenises = Jenis::all();
        $kategoris = Kategori::all();
        $suppliers = Supplier::all();
        $produk = Produk::where('id', $id)->first();

        return view('admin.produk.edit', compact('jenises', 'kategoris', 'suppliers', 'produk'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'jenis_id' => 'required',
            'kategori_id' => 'required',
            'supplier_id' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'nama.required' => 'Nama produk tidak boleh kosong!',
            'jenis_id.required' => 'Jenis harus dipilih!',
            'kategori_id.required' => 'Kategori harus dipilih!',
            'supplier_id.required' => 'Supplier harus dipilih!',
            'stok.required' => 'Stok tidak boleh kosong!',
            'harga.required' => 'Harga tidak boleh kosong!',
            'gambar.image' => 'Gambar yang dimasukan salah!',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return back()->withInput()->with('error', $errors);
        }

        $produk = Produk::findOrFail($id);

        if ($request->gambar) {
            Storage::disk('local')->delete('public/uploads/' . $produk->gambar);
            $gambar = str_replace(' ', '', $request->gambar->getClientOriginalName());
            $namaGambar = 'produk/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar->storeAs('public/uploads/', $namaGambar);
        } else {
            $namaGambar = $produk->gambar;
        }

        Produk::where('id', $produk->id)
            ->update([
                'nama' => $request->nama,
                'kategori_id' => $request->kategori_id,
                'supplier_id' => $request->supplier_id,
                'stok' => $request->stok,
                'harga' => $request->harga,
                'gambar' => $namaGambar,
            ]);

        return redirect('admin/produk')->with('success', 'Berhasil memperbarui Produk');
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        Storage::disk('local')->delete('public/uploads/' . $produk->gambar);
        $produk->detail_transaksi()->delete();
        $produk->delete();

        return redirect('admin/produk')->with('success', 'Berhasil menghapus Produk');
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

    public function kategori($id)
    {
        $kategoris = Kategori::where('jenis_id', $id)->get();

        return json_decode($kategoris);
    }

}