<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signin(Request $req)
    {
        if (!Auth::attempt($req->only('username', 'password'))) {
            return response(['message' => __('auth.failed')], 422);
        }

        $user = $req->user();

        if (!$user->isactive) {
            return response(['message' => 'User is not active.'], 403);
        }

        $token = $req->user()->createToken('client-app');
        return ['token' => $token->plainTextToken];
    }

    public function signout(Request $req)
    {
        $req->user()->currentAccessToken()->delete();
        return response()->noContent();
    }

    public function session(Request $req)
    {
        return $req->user();
    }
}
