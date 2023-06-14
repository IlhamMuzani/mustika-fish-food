<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('layouts.login');
    }
    public function checkUser()
    {
        if(auth()->user()->isAdmin())
        {
            return redirect('admin');
        } 
        elseif (auth()->user()->isKasir())
        {
            return redirect('kasir');
        }
        elseif (auth()->user()->isOwner())
        {
            return redirect('owner');
        }
    }

}