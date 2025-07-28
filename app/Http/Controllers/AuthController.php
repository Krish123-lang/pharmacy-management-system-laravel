<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        // $password = Hash::make('password123');
        // dd($password);
        return view('auth.login');
    }

    public function login_post(Request $request)
    {
        
        // $credentials = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            if (Auth::user()->is_role == 'ADM') {
                return to_route('dashboard');
            } else {
                return redirect()->back()->with('error', 'Please enter correct credentials!');
            }
        } else {
            return redirect()->back()->with('error', 'Please enter correct credentials!');
        }
    }

    public function forgot()
    {
        return view('auth.forgot');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login');
    }

    public function register()
    {
        return view('auth.register');
    }
}
