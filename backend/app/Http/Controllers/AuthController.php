<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterAuthRequest;
use App\Http\Requests\LoginAuthRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Services\AuthService;


class AuthController extends Controller
{
 
    public function register(RegisterAuthRequest $request)
    {

        $validated = $request->validated();

        $Auth = new AuthService();
        return response()->json( $Auth->register($request) );
  
    }
 
    public function login(LoginAuthRequest $request)
    {
        $validated = $request->validated();

        $Auth = new AuthService();
        return response()->json( $Auth->login($request) );

    }
 
    public function logout(Request $request)
    {

        $Auth = new AuthService();
        return response()->json( $Auth->logout($request) );

    }
 
    public function getAuthUser(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
 
        $user = JWTAuth::authenticate($request->token);
 
        return response()->json(['user' => $user]);
    }
}
