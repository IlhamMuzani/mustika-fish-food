<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Dompdf\Dompdf;

class LaporantransaksiController extends Controller
{
    public function index(Request $request)
    {
        $transaksis = Transaksi::get();
        return view('owner.laporan-transaksi.index', compact('transaksis'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        $detail_transaksis = DetailTransaksi::where('transaksi_id', $id)->get();

        return view('owner.laporan-transaksi.show', compact('transaksi', 'detail_transaksis'));
    }

    // public function cetakpdf()
    // {
    //     $cetakpdf = DetailTransaksi::all();
    //     $html = view('owner.laporan-transaksi.print', compact('cetakpdf'));

    //     $dompdf = new Dompdf();
    //     $dompdf->loadHtml($html);
    //     $dompdf->setPaper('A4', 'landscape');

    //     $dompdf->render();

    //     $dompdf->stream();
    // }

    public function cetakpdf()
    {
        $cetakpdf = DetailTransaksi::all();

        // Load the view and set the paper size to portrait letter
        $pdf = PDF::loadView('owner.laporan-transaksi.print', compact('cetakpdf'));
        $pdf->setPaper('letter', 'portrait'); // Set the paper size to portrait letter

        return $pdf->stream('Laporan Transaksi.pdf');
    }
}