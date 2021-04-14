<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
            return redirect()->route('users.list')->with('message', 'Login successfully');
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
        return redirect()->route('login')->with('message', 'Bạn đã đăng xuất thành công.');
    }

    public function getAll()
    {
        $users = User::all();
        return view('backend.logins.list', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.logins.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->all());

        if ($request->hasFile('image')) {
            $currentImg = $user->file('image');
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }

            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $user->image = $path;
        }

        $user->save();
        return redirect()->route('users.list')->with('message', 'Cập nhập thủ thư thành công.');
    }

    public function create()
    {
        return view('backend.logins.create');
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $user->fill($request->all());
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $user->image = $path;
        }

        $user->save();
        return redirect()->route('users.list')->with('mesage', 'Thêm nhân viên thành công.');

    }

}
