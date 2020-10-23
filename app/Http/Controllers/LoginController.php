<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($data)) {
            return redirect()->route('dashboard.home');
        }

        return redirect()->back();
    }

    public function logout(Request $request)
    {
        if(!Auth::check())
            return redirect()->route('auth.login');

        Auth::logout();
        return redirect()->route('auth.login');
    }
}
