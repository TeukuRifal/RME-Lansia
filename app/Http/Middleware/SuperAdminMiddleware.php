<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna belum terautentikasi atau bukan super admin
        if (!Auth::check() || Auth::user()->role !== 'superadmin') {
            return redirect()->route('superadmin.login'); // Redirect ke halaman login super admin
        }

        return $next($request);
    }
}
