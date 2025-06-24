<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            return match ($user->role) {
                'admin' => redirect()->route('admin.dashboard'),
                'kepsek' => redirect()->route('kepsek.dashboard'),
                'user' => redirect()->route('siswa.dashboard'),
                default => redirect()->route('login')->with('error', 'Role tidak dikenali'),
            };
        }
    
        return back()->with('error', 'Email atau password salah');
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('login');
    }
    
}