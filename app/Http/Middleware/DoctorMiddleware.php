<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user has the 'doctor' role
        if (Auth::check() && Auth::user()->role === 'doctor') {
            return $next($request);
        }

        // Redirect or handle unauthorized access as needed
        return redirect()->route('login'); // You can customize this based on your requirements
    }
}
