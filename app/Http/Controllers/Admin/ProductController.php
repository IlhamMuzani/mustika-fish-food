<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Suplayer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::paginate(3);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            //dijalankan jika ada pencarian
            $products = Product::where('nama', 'LIKE', "%$filterKeyword%")->paginate(2);
        }
        return view('admin/product.index', compact('products'));
    }

    public function create()
    {
        $suplayers = Suplayer::all();
        return view('admin/product.create', compact('suplayers'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'jenis' => 'required',
                'suplayer_id' => 'required',
                'kategori' => 'required',
                'harga' => 'required',
                'stok' => 'required',
                'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',

            ],
            [
                'nama.required' => 'Nama tidak boleh kosong !',
                'jenis.required' => 'Jenis tidak boleh kosong !',
                'suplayer_id.required' => 'Pilih suplayer !',
                'kategori.required' => 'Kategori tidak boleh kosong !',
                'harga.required' => 'Harga tidak boleh kosong !',
                'gambar.required' => 'Gambar harus ditambahkan!',
                'gambar.image' => 'Gambar yang dimasukan salah!',
                'stok.required' => 'Stok tidak boleh kosong !'
            ]
        );

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return back()->withInput()->with('status', $errors);
        }

        $gambar = str_replace(' ', '', $request->gambar->getClientOriginalName());
        $namaGambar = 'product/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
        $request->gambar->storeAs('public/uploads/', $namaGambar);

        Product::create(array_merge($request->all(), [
            'gambar' => $namaGambar,
        ]));

        return redirect('admin/product')->with('status', 'Berhasil menambahkan product');
    }

    public function show($id)
    {
        $product = Product::whare('id', $id)->first();
        return view('amin/product', compact('product'));
    }

    public function edit($id)
    {
        $suplayers = Suplayer::all();
        $product = Product::where('id', $id)->first();

        return view('admin/product.edit', compact('product', 'suplayers'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'kategori' => 'required',
                'suplayer_id' => 'required',
                'jenis' => 'required',
                'harga' => 'required',
                'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
                'stok' => 'required'
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong !',
                'kategori.required' => 'Pilih kategori !',
                'suplayer_id.required' => 'Pilih suplayer !',
                'jenis.required' => 'Pilih jenis !',
                'harga.required' => 'Harga tidak boleh kosong !',
                'gambar.image' => 'Gambar yang dimasukan salah !',
                'stok.required' => 'Stok tidak boleh kosong !'
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('status', $error);
        }

        $product = Product::findOrFail($id);

        if ($request->gambar) {
            Storage::disk('local')->delete('public/uploads/' . $product->gambar);
            $gambar = str_replace(' ', '', $request->gambar->getClientOriginalName());
            $namaGambar = 'product/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar->storeAs('public/uploads/', $namaGambar);
        } else {
            $namaGambar = $product->gambar;
        }

        Product::where('id', $product->id)
            ->update([
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'suplayer_id' => $request->suplayer_id,
                'jenis' => $request->jenis,
                'harga' => $request->harga,
                'gambar' => $namaGambar,
                'stok' => $request->stok
            ]);

        return redirect('admin/product')->with('status', 'Berhasil memperbarui produk');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        Storage::disk('local')->delete('public/uploads/' . $product->gambar);
        $product->delete();

        return redirect('admin/product')->with('status', 'Berhasil menghapus data produk');
    }
}