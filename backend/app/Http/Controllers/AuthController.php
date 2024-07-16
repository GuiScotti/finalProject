<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:User',
            'password' => 'required|string|min:8|confirmed',
            'documentType' => 'required|in:CPF,CNPJ',
            'documentNumber' => 'required|string|unique:User',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'não foi possivel registrar, tente novamente',
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'documentType' => $request->documentType,
            'documentNumber' => $request->documentNumber,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User Registrado com Sucesso', 'user' => $user], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!auth::attempt($credentials)) {
            return response()->json(['message' => 'Credenciais Invalidas'], 401);
        }

        $user = Auth::User();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
    }
}
