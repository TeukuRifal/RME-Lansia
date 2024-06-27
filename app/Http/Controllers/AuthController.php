<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Patient;

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
            $patient = Patient::where('nik', $credentials['username'])->first();

            if ($patient && Hash::check($credentials['password'], $patient->password)) {
                Auth::guard('patient')->login($patient);
                return redirect()->route('pages.pasien');
            }
        }

        return redirect()->route('login')->with('error', 'Login failed. Please check your credentials.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
