<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Events\EventNovoRegistro;

class LoginAPIController extends Controller
{
    public function register(Request $request) {
        
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
        
        $user = new User([
            'name'=> $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'token' => str_random(60)
        ]);
        $user->save();
        
        event(new EventNovoRegistro($user));

        return response()->json([
            'res'=>'User created.'
        ], 201);
    }

    public function login(Request $request) {
        
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        $credenciais = [
            'email' => $request->email,
            'password' => $request->password,
            'active' => 1
        ];

        if (!Auth::attempt($credenciais))
            return response()->json([
                'res' => 'Acesso negado'
            ], 401);
        
        $user = $request->user();
        $token = $user->createToken('access token')->accessToken;

        return response()->json([
            'token' => $token
        ], 200);
    }

    public function logout(Request $request) {
        $request->user()->token()->revoke();
        return response()->json([
            'res' => 'Logout'
        ]);
    }

    public function activateregister($id, $token) {
        $user = User::find($id);
        if ($user) {
            if ($user->token == $token) {
                $user->active = true;
                $user->token = '';
                $user->save();
                return view('activated register');
            }
        }
        return view('activated register');
    }
}
