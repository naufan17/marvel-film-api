<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'Unprocessable content', 
                'message' => 'Invalid data request body',
                'error' => $validator->errors()
            ], 422);       
        };

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'Created', 
            'message' => 'Register successful', 
            'data' => [
                'access_token' => $token, 
                'token_type' => 'Bearer'    
            ]
        ], 201);
    }
    
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'Unprocessable content', 
                'message' => 'Invalid data request body',
                'error' => $validator->errors()
            ], 422);       
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'status' => 'Unauthorized',
                'message' => 'Invalid email and password'
            ], 401);
        }
                
        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'OK', 
            'message' => 'Login successful',
            'data' => [
                'access_token' => $token, 
                'token_type' => 'Bearer'    
            ]
        ], 200);
    }
    
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'status' => 'OK', 
            'message' => 'Logout successfully and token was deleted'
        ], 200);
    }
}
