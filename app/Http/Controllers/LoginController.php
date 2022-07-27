<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
            'password' => 'required|min:6',
        ]);

        $kredensi = $request->only('name','password');
        if (Auth::attempt($kredensi)) {
            $user = Auth::user();
            if($user->name == 'admin'){
                return redirect()->intended('/');
            }elseif($user->name == 'kasir'){
                return redirect()->intended('/');
            }elseif($user->name == 'manajer'){
                return redirect()->intended('/');
            }
            return redirect()->intended('/guru');
        }
        return redirect('login')->with('loginError','Login Failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
