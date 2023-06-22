<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index() {
        $jenises = Jenis::all();
        return view('admin.jenis.index', compact('jenises'));
    }
}