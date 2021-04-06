<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function index()
    {
        return view('backend.logins.login');
    }

    public function authenticate(Request $request)
    {
        // $credentials = $request->only('email', 'password');
        $credentials = ['email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            Session::regenerate();
            Session::push('login', true);
            return redirect()->route('book.index')->with('message', 'Login successfully');
        } else {
            return redirect()->route('users.index')->with('error', 'login false');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('users.index')->with('message', 'Bạn đã đăng xuất thành công.');
    }
}
