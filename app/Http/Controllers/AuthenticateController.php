<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function register(Request $request){
        
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->save();

        return response()->json([
            'message'=>'Registered with success.'
        ], 201);
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email'=> $request->email,
            'password'=> $request->password,
        ];

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message'=>'Denied access.'
            ], 401);
        }

        $user = $request->user();
        $token = $user->createToken('Access Token')->accessToken();
        
        return response()->json([
            'token' => $token
        ], 200);
    }

    public function logout(Request $request){
        $request->user()->token()->revoke();
        
        return response()->json([
            'message' => 'Logged out'
        ], 200);
    }
}
