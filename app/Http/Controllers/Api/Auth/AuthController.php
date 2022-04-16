<?php

namespace App\Http\Controllers\Api\auth;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Str;


use Illuminate\Http\Request;

class AuthController extends ApiController
{
    public function login(LoginRequest $request)
    {
        $validatedData = $request->all();

        if (!auth()->attempt($validatedData)) {
            return $this->respondFailedLogin();
        }

        $tokenResult = auth()->user()->createToken(Str::random(15));

        return $this->respondWithToken($tokenResult);
    }

    protected function respondWithToken($tokenResult)
    {
        return response()->json([
            'token' => $tokenResult->plainTextToken
        ], 200);
    }

    public function register(RegisterRequest $request)
    {

        $user = User::create([
            'surname' => $request->first_name,
            'name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $tokenResult = $user->createToken(Str::random(15));

        return $this->respondWithToken($tokenResult);
    }
}
