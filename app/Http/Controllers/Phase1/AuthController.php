<?php

namespace App\Http\Controllers\Phase1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Login endpoint - validates credentials and returns JWT token
     * 
     * POST /api/v1/auth/login
     * {
     *   "email": "guardian@shaiyra.test",
     *   "password": "password123"
     * }
     */
    public function login(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Find user by email
        $user = User::where('email', $validated['email'])->first();

        // Check if user exists and password is correct
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials. Please check your email and password.'],
            ]);
        }

        // Check if user is active
        if (!$user->is_active) {
            return response()->json([
                'message' => 'This account has been deactivated.',
                'status' => 'inactive'
            ], 403);
        }

        // Generate API token (using Laravel's built-in token generation)
        // For production, use Laravel Sanctum or Passport for JWT
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'status' => 'success',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'email_verified' => $user->email_verified_at !== null,
            ],
            'token' => $token,
            'token_type' => 'Bearer',
        ], 200);
    }

    /**
     * Register endpoint - creates new user account
     * 
     * POST /api/v1/auth/register
     * {
     *   "name": "John Doe",
     *   "email": "john@example.com",
     *   "password": "password123",
     *   "password_confirmation": "password123"
     * }
     */
    public function register(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Create user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'email_verified_at' => now(), // Auto-verify for now
            'is_active' => true,
        ]);

        // Generate token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Registration successful',
            'status' => 'success',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
            'token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }

    /**
     * Logout endpoint - revokes user token
     * 
     * POST /api/v1/auth/logout
     * Headers: Authorization: Bearer {token}
     */
    public function logout(Request $request)
    {
        // Revoke all tokens for user (when using Sanctum)
        // For session-based auth, just destroy the session
        if ($request->user()) {
            $request->user()->tokens()->delete();
        }

        return response()->json([
            'message' => 'Logged out successfully',
            'status' => 'success',
        ], 200);
    }

    /**
     * Get current user info
     * 
     * GET /api/v1/auth/me
     * Headers: Authorization: Bearer {token}
     */
    public function me(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'user' => [
                'id' => $request->user()->id,
                'name' => $request->user()->name,
                'email' => $request->user()->email,
                'email_verified' => $request->user()->email_verified_at !== null,
            ],
        ], 200);
    }

    /**
     * Refresh token
     * 
     * POST /api/v1/auth/refresh
     * Headers: Authorization: Bearer {token}
     */
    public function refresh(Request $request)
    {
        // For Sanctum, tokens don't need refresh, they're long-lived
        // This is a placeholder for future JWT implementation
        return response()->json([
            'message' => 'Token refreshed',
            'status' => 'success',
            'token' => $request->user()->currentAccessToken()->token,
            'token_type' => 'Bearer',
        ], 200);
    }
}
