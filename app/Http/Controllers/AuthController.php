<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(LoginRequest $request)
    {
        $creadentials = $request->only(['email', 'password']);

        if (Auth::attempt($creadentials)) {
            $request->session()->regenerate();

            $user = User::where('email', $request->email)->first();

            if ($user->isAdmin()) {
                return redirect()->intended('/admin/dashboard');
            }

            return to_route('user.dashboard');
        }
        return back()->withErrors([
            'email' => 'Email atau kata sandi salah.', // Pesan error jika autentikasi gagal
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost()
    {
        return;
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return to_route('login');
    }
}
