<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Handle user login using only email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        
        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if ($user) {
            
            if ($user->is_admin || $user->is_approved) {
                
                $token = $user->createToken('AuthToken')->plainTextToken;
                $response = [
                    'user' => $user,
                    'token' => $token,
                ];
                return response($response, 201);
            } else {
               
                return response()->json(['message' => 'User not authorized.'], 403);
            }
        }

        
        return response()->json(['message' => 'Invalid credentials.'], 401);
    }
    
}
