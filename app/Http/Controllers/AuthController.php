<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Método para processar o login do usuário.
     */
    public function login(Request $request)
    {
        var_dump($request);
        // Validação dos campos
        $credentials = $request->validate([
            'email' => 'required|email',
            'senha' => 'required'
        ]);

        // Tentativa de autenticação
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['senha']])) {
            $user = Auth::user();
            return response()->json([
                'message' => 'Login realizado com sucesso!',
                'user' => $user,
                'token' => $user->createToken('auth_token')->plainTextToken
            ], 200);
        }
        
        return response()->json(['message' => 'Credenciais inválidas'], 401);
    }
}