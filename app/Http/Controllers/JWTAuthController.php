<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTAuthController extends Controller {
    public function register(Request $request) {
        $data = $request->validate([
            'login' => 'required|string|max:255',
            'senha' => 'required|string',
            'tipo' => 'required|string',
        ]);

        $user = Usuario::create([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'senha' => Hash::make($data['senha'])
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'), 201);
    }

    public function login(Request $request) {
        $cred = $request->only('email', 'password');

        try {
            if (!JWTAuth::attempt($cred)) {
                return response()->json([
                    'error' => 'Invalid credentials'
                ], 401);
            }

            $user = JWTAuth::user();

            // No caso de atribuir um papel
            // $token = JWTAuth::claims(['role' => $user->role])->fromUser($user);
            $token = JWTAuth::fromUser($user);

            return response()->json(compact('token'));
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }
    }

    public function logout() {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Logout successfully'], 200);
    }
}
