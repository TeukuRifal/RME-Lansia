<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $role = $request->input('role');

        if ($role === 'admin') {
            // Login untuk Admin
            $user = User::where('email', $credentials['username'])->first();

            if ($user && Hash::check($credentials['password'], $user->password)) {
                Auth::login($user);
                return redirect()->route('dashboard');
            }
        } elseif ($role === 'patient') {
            // Login untuk Pasien
            $patient = User::where('username', $credentials['username'])->first();

            if ($patient && Hash::check($credentials['password'], $patient->password)) {
                Auth::login($patient);
                return redirect()->route('kesehatan');
            }
        }

        // Logging error jika login gagal
        Log::error('Failed login attempt', [
            'username' => $credentials['username'],
            'role' => $role,
            'ip' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
        ]);

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function showSuperAdminLoginForm()
    {
        return view('auth.superadmin_login');
    }

    public function superAdminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->where('role', 'superadmin')->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            return redirect()->route('superadmin.dashboard');
        }

        // Logging error jika login gagal
        Log::error('Failed Super Admin login attempt', [
            'email' => $credentials['email'],
            'ip' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
        ]);

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
}
