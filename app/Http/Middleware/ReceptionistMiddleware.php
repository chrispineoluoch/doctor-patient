<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReceptionistMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user has the receptionist role
        if ($request->user() && $request->user()->role === 'receptionist') {
            return $next($request);
        }

        // If not a receptionist, redirect or handle as needed
        return redirect()->route('homepage');
    }
}
