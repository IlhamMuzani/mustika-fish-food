<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('admin.index');
    }
    
    public function admin()
    {
        return view('ikan.index');
    }

    public function owner()
    {
        return view('transaksi.index');
    }
}