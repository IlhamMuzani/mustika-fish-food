<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function checkUser()
    {
        if(auth()->user()->isAdmin())
        {
            return redirect('admin');
        } elseif (auth()->user()->isKasir())
        {
            return redirect('kasir');
        }
        elseif (auth()->user()->isKasir())
        {
            return redirect('owner');
        }
    }

}