<?php

namespace App\Api\Controllers;

use App\User;
use App\Support;
use Dingo\Api\Facade\API;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthController extends BaseController
{
    public function me(Request $request)
    {
        return JWTAuth::parseToken()->authenticate();
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }

    public function validateToken()
    {
        // Our routes file should have already authenticated this token, so we just return success here
        return API::response()->array(['status' => 'success'])->statusCode(200);
    }

    public function register(Request $request)
    {
        //TODO fix validation exception
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:4',
        ]);

        $newUser = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'verification_string' => str_random(30),
        ];

        $user = User::create($newUser);
        $token = JWTAuth::fromUser($user);

        return response()->json(compact('token'));
    }

    public function verify($verificationString)
    {
        try {
            $user = User::where('verification_string', '=', $verificationString)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Provided credentials are invalid'], 401);
        }

        $user->verification_string = null;
        $user->verified = true;
        $user->save();

        $token = JWTAuth::fromUser($user);
        return response()->json(compact('token'));
    }

}