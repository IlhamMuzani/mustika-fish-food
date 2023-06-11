<?php

namespace App\Http\Controllers;

use App\Models\Ikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class IkanController extends Controller
{
    public function index()
    {
        $ikans = Ikan::paginate(3);
        return view('ikan.index', compact('ikans'));
    }
    
    public function create()
    {
        return view('ikan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'=>'required',
            'jenis_ikan'=>'required',
            'kategori'=>'required',
            'stok'=>'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',

        ],
        [
            'nama.required' => 'Nama tidak boleh kosong !',
            'jenis_ikan.required' => 'Jenis ikan tidak boleh kosong !',
            'kategori.required' => 'Kategori tidak boleh kosong !',
            'gambar.required' => 'Gambar harus ditambahkan!',
            'gambar.image' => 'Gambar yang dimasukan salah!',
            'stok.required' => 'Stok tidak boleh kosong !'
        ]);

        if($validator->fails()) {
            $errors = $validator->errors()->all();
            return back()->withInput()->with('status', $errors);
        }

        $gambar = str_replace(' ', '', $request->gambar->getClientOriginalName());
        $namaGambar = 'ikan/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
        $request->gambar->storeAs('public/uploads/', $namaGambar);

        Ikan::create(array_merge($request->all(), [
            'gambar' => $namaGambar,
        ]));

        return redirect('ikan')->with('status', 'Berhasil menambahkan ikan');
    }

    public function destroy($id)
    {
        $ikan = Ikan::find($id);
        Storage::disk('local')->delete('public/uploads/' . $ikan->gambar);
        $ikan->delete();

        return redirect('ikan')->with('status', 'Berhasil menghapus data ikan');
    }
}