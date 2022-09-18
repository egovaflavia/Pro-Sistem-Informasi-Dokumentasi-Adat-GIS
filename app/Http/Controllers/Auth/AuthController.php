<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function username()
    {
        return 'username';
    }

    public function login()
    {
        return view('backend.auth.login');
    }

    public function loginProses(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
