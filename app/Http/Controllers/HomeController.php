<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->isAdmin()) {
            return redirect('admin');
        } elseif (auth()->user()->isKasir()) {
            return redirect('kasir');
        } elseif (auth()->user()->isOwner()) {
            return redirect('owner');
        }
    }
}
