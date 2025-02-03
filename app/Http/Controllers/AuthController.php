<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan Anda memiliki view 'auth.login'
    }

    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('auth.register'); // Pastikan Anda memiliki view 'auth.register'
    }

    public function register(Request $request)
    {
        // Validasi input dari pengguna
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Buat user baru dan set role sebagai staff
       $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' =>$request->email
        ]);

        return redirect()->route('login')->with('success', 'Your account has been created. Please login.');
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // Coba login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Hindari session fixation attack
            return redirect()->route('home')->with('success', 'Welcome back!');
        }
    
        // Jika gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->onlyInput('email');
    }
    public function logout()
    {
        Auth::logout(); // Logout pengguna
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
