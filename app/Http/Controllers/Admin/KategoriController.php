<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jenis;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        $jenises = Jenis::all();

        return view('admin.kategori.create', compact('jenises'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'jenis_id' => 'required',

        ], [
            'nama.required' => 'Nama produk tidak boleh kosong!',
            'jenis_id.required' => 'Jenis harus dipilih!',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return back()->withInput()->with('error', $errors);
        }


        Kategori::create($request->all());


        return redirect('admin/kategori')->with('success', 'Berhasil menambahkan Kategori');
    }

    public function edit($id)
    {

        $kategoris = Kategori::where('id', $id)->first();
        $jenises = Jenis::all();

        return view('admin.kategori.edit', compact('kategoris', 'jenises'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',

        ], [
            'nama.required' => 'Nama produk tidak boleh kosong!',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return back()->withInput()->with('error', $errors);
        }

        $produk = Kategori::findOrFail($id);

        Kategori::where('id', $produk->id)
            ->update([
                'nama' => $request->nama,

            ]);

        return redirect('admin/kategori')->with('success', 'Berhasil memperbarui Kategori');
    }


    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->produk()->delete();
        $kategori->delete();
        return redirect('admin/kategori')->with('success', 'Berhasil menghapus kategori');
    }
}