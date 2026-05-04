<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     * 
     * Checks for valid authentication token in:
     * 1. Authorization header (Bearer token for API)
     * 2. Session cookie (for web routes)
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If user is already authenticated via session, allow
        if ($request->user()) {
            return $next($request);
        }

        // Check for Bearer token in Authorization header (API requests)
        if ($request->bearerToken()) {
            // Token will be processed by Sanctum middleware
            return $next($request);
        }

        // If not authenticated, return 401 Unauthorized for API
        if ($request->is('api/*')) {
            return response()->json([
                'message' => 'Unauthenticated',
                'status' => 'error',
            ], 401);
        }

        // For web routes, redirect to login
        return redirect()->route('login-page');
    }
}
