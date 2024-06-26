<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('patient')->check() && Auth::user()->role === 'patient') {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
