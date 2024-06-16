<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        if(!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details',
            ],401);
        }

        $token = app(UserRepository::class)->createTokenByEmail($request->email);
        
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
