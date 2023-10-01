<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;


class LaporanmasukController extends Controller
{
    public function index(Request $request)
    {

        if ($request->jenis_id) {
            $produks = Produk::whereHas('kategori', function ($query) use ($request) {
                $query->where('jenis_id', $request->jenis_id);
            })->get();
        } else {
            $produks = Produk::get();
        }


        return view('owner.laporan-masuk.index', compact('produks'));
    }

    public function show($id)
    {
        $produk = Produk::where('id', $id)->first();

        return view('owner.laporan-masuk.show', compact('produk'));
    }

    public function cetakpdf()
    {
        $cetakpdf = Produk::all();
        $html = view('owner.laporan-masuk.print', compact('cetakpdf'));

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream();
    }

    // public function cetakpdf()
    // {
    //     $cetakpdf = Produk::all();

    //     // Load the view and set the paper size to portrait letter
    //     $pdf = PDF::loadView('owner.laporan-masuk.print', compact('cetakpdf'));
    //     $pdf->setPaper('letter', 'portrait'); // Set the paper size to portrait letter

    //     return $pdf->stream('Laporan Masuk.pdf');
    // }

    public function create()
    {
        return view('user.create');
    }
}