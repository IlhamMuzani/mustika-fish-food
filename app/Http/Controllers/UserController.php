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
        Session::flash('username', $request->username);
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong'
        ]);

        $infoLogin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        $user = User::where('username', $request->username)->first();
        if (is_null($user)) {
            return redirect('login')->with('error', array('User tidak ditemukan'));
        }

        if (Auth::attempt($infoLogin)) {
            return redirect('checkuser')->with('success', 'Berhasil login');
        } else {
            return back()->with('error', array('Username dan password tidak sesuai'));
        }
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('success', 'Berhasil logout');
    }
}