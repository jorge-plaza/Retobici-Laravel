<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends Controller
{
    public static function getUserByToken(Request $request):User|null
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());
        return ($token != null) ? $token->tokenable : null;
    }
}
