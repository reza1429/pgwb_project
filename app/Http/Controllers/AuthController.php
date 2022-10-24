<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register()
    {
        $data['title'] = 'Register';
        return view('auth.registrasi', $data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 1
        ]);
        $user->save();
        return redirect()->route('login')->with('success', 'registrasi berhasil, harap login!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors(['password' => 'email atau password salah!']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('login');
    }
}
