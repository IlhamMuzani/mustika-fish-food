<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('layouts.dashboard');
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