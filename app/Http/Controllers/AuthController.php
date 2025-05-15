<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function registerPost(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = $file->hashName();
            $filepath = Storage::disk('uploads')->putFileAs('user', $file, $name);

            $user->customer()->create([
                'telepon' => $request->telepon,
                'jk' => $request->jk,
                'address' => $request->address,
                'photo' => $filepath
            ]);
        }

        Auth::login($user);

        return redirect()->intended('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return to_route('login');
    }
}
