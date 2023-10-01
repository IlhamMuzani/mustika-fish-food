<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index() {
        $kategoris = Kategori::all();
        return view('admin.kategori.index', compact('kategoris'));
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->produk()->delete();
        $kategori->delete();
        return redirect('admin/kategori')->with('success', 'Berhasil menghapus kategori');
    }
}