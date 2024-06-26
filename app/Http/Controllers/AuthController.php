<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            if (Auth::guard('admin')->attempt(['email' => $credentials['username'], 'password' => $credentials['password']])) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->with('error', 'Login failed. Please check your credentials and try again.');
            }
        } elseif ($role === 'patient') {
            $field = filter_var($credentials['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'nama_lengkap';
            $credentials[$field] = $credentials['username'];
            unset($credentials['username']);

            if (Auth::guard('patient')->attempt($credentials)) {
                return redirect()->route('kesehatan');
            } else {
                return redirect()->back()->with('error', 'Login failed. Please check your credentials and try again.');
            }
        }

        return redirect()->back()->with('error', 'Invalid role selected.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

