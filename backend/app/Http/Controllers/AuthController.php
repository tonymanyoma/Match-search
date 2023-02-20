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
        $response = $Auth->register($request);
        return $response;
  
    }
 
    public function login(LoginAuthRequest $request)
    {
        $validated = $request->validated();

        $Auth = new AuthService();
        $response = $Auth->login($request);
        return $response;


    }
 
    public function logout(Request $request)
    {

        $Auth = new AuthService();
        $response = $Auth->logout($request);
        return $response;

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
