<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function loginUser(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|string|email', // Ensure valid email format
            'password' => 'required|string',
        ]);

        // Attempt to find the user by email
        $user = User::where('email', $request->email)->first();

        // Check if user exists and password is correct
        if (!$user || !Hash::check($request->password, $user->password)) {
            // Respond with an appropriate status code for invalid credentials
            return response()->json(['message' => 'Invalid credentials.'], $user ? 403 : 401);
        }

        // Generate and return Sanctum Token
        return response()->json([
            'message' => 'Login successful',
            'token' => $user->createToken('auth_token')->plainTextToken,
            'user' => $user
        ]);
    }

}
