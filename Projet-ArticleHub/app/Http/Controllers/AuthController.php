<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->only('email','password');
        
        if(Auth::attempt($credentials)) {
            $request->session()->put('userId', Auth::user()->id);
            $request->session()->put('userEmail', Auth::user()->email);

            return redirect()->intended('/');
        }

        return back()->withInput()->withErrors(['email'=> 'These credentials do not match our records.']);
    }

    public function logout() {
        Session::forget(['userId, userEmail']);
    }
}
