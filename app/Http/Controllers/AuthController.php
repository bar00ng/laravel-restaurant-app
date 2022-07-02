<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        if(!Auth::check()) {
            return view('Login');
        } else {
            return redirect('/');
        }
    }

    public function login(Request $r) {
        $r->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $r->only('username','password');
        if(Auth::attempt($credentials)) {
            return redirect()->intended('/')->withSuccess('Signed In');
        }

        return redirect('')->withSuccess('Login details are not valid');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        
        return redirect('');
    }
}
