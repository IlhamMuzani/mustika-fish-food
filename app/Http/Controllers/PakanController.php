<?php

namespace App\Http\Controllers;

use App\Models\Ikan;
use App\Models\Pakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PakanController extends Controller
{
    public function index()
    {
        $pakans = Pakan::paginate(3);
        return view('pakan.index', compact('pakans'));
    }

    public function create()
    {
        $ikans = Ikan::all();
        return view('pakan.create', compact('ikans'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'ikan_id' => 'required',
                'stok' => 'required',
                'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong !',
                'ikan_id.required' => 'Kategori tidak boleh kosong !',
                'stok.required' => 'Stok tidak boleh kosong !',
                'gambar.required' => 'Gambar harus ditambahkan!',
                'gambar.image' => 'Gambar yang dimasukan salah!',            ]
        );

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return back()->withInput()->with('status', $errors);
        }

        $gambar = str_replace(' ', '', $request->gambar->getClientOriginalName());
        $namaGambar = 'pakan/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
        $request->gambar->storeAs('public/uploads/', $namaGambar);

        Pakan::create(array_merge($request->all(), [
            'gambar' => $namaGambar,
        ]));
        return redirect('pakan')->with('status', 'Berhasil menambahkan pakan');
    }

    public function destroy($id)
    {
        $pakan = Pakan::find($id);
        Storage::disk('local')->delete('public/uploads' . $pakan->gambar);
        $pakan->delete();

        return redirect('pakan')->with('status', 'Berhasil menghapus pakan');
    }
}