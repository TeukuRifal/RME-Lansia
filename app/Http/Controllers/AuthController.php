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
        $credentials = $request->validate([
            'identifier' => 'required',
            'password' => 'required',
            'role' => 'required|in:admin,patient',
        ]);

        // Determine the field to use for login
        $field = filter_var($request->input('identifier'), FILTER_VALIDATE_EMAIL) ? 'email' : 'nik';
        $credentials[$field] = $request->input('identifier');
        unset($credentials['identifier']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return $this->authenticated($request, Auth::user()->role);
        }

        return back()->withErrors([
            'identifier' => 'The provided credentials do not match our records.',
        ]);
    }

    protected function authenticated(Request $request, $role)
    {
        if ($role === 'admin') {
            return redirect()->route('admin.dashboard'); // Redirect to admin dashboard
        } elseif ($role === 'patient') {
            return redirect()->route('patient.kesehatan'); // Redirect to patient kesehatan page
        }

        // Default fallback if role is not recognized
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
