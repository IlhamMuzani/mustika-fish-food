<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        return view('layouts.login');
    }

    public function login_action(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong'
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $user = User::where('email', $request->email)->first();
        if (is_null($user)) {
            return redirect('login')->with('error', array('User tidak ditemukan'));
        }

        if (Auth::attempt($infoLogin)) {
            return redirect('checkuser')->with('success', 'Berhasil login');
        } else {
            return back()->with('error', array('Email dan password tidak sesuai'));
        }
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('success', 'Berhasil logout');
    }
}