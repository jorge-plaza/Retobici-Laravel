<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);

        if ( $validator->fails() || !auth('api')->attempt($validator->validated()) ) {
            return response()->json(['Invalid credentials'], 401);
        }

        return response()->json([
            'token' => auth('api')->user()->createToken('API Token')->plainTextToken,
            'user' => auth('api')->user()
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return  response()->json(['Token revoked']);
    }
}