<?php

namespace App\Http\Services;

use JWTAuth;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;


class AuthService
{

    public $loginAfterSignUp = true;


    public function register($request)
    {
        try {
            
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
    
            if ($this->loginAfterSignUp) {
                return $this->login($request);
            }
    
            return response()->json([
                'success' => true,
                'data' => $user
            ], Response::HTTP_OK);

        }catch (JWTException $exception) {
                
            return response()->json([
                'success' => false,
                'message' => 'Lo siento, el usuario no pudo ser registrado'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }   
    }

    public function login($request)
    {
        $input = $request->only('email', 'password');
        $jwt_token = null;
 
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Email o contraseña inválidos',
            ], Response::HTTP_UNAUTHORIZED);
        }
 
        return response()->json([
            'success' => true,
            'token' => $jwt_token,
        ]);
    }

    public function logout($request)
    {

 
        try {
            JWTAuth::invalidate($request->token);
 
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}