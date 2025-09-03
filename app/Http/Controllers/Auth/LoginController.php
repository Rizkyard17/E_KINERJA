<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        // Jika user sudah login, arahkan ke dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.loginPage');
    }

    // Proses login
    public function loginStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('name', $request->name)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();

            // Redirect berdasarkan role
            if ($user->role === 'superadmin') {
                return redirect()->route('superadmin.dashboard')->with('success', 'Selamat datang, Super Admin!');
            } elseif ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Selamat datang, Admin!');
            } else {
                return redirect()->route('user.dashboard')->with('success', 'Selamat datang!');
            }
        }

        return back()->withErrors([
            'name' => 'Nama atau password salah.',
        ])->withInput($request->except('password'));
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        // Hapus session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda berhasil keluar.');
    }
}