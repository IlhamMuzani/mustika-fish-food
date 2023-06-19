<?php

namespace App\Http\Controllers\Owner;

use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::paginate(3);
        return view('owner/laporan.index', compact('laporans'));
    }
}