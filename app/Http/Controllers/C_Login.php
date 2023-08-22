<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_Login extends Controller
{
    public function index()
    {
        return view('v_login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');

        if (Auth::user()->ban == '0'); 
            {
                return redirect('/dashboard');
            }
        if(Auth::user()->ban == '0') 
            {
                return redirect('/home');
            }
        }

        return back()->with('loginError', 'Login gagal');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }

//  Use this below to redirect 
    protected $redirectTo = '/login';

// OR-Else => use if you already used to redirecting authentication as per role. 
    protected function authenticated()
{
    if(Auth::user()->ban == '0') // Normal or Default User Login
    {
        return redirect('/');
    }
}
}
