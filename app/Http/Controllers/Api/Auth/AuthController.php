<?php

namespace App\Http\Controllers\Api\Auth;

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

        return $this->respondWithToken($tokenResult, auth()->user());
    }

    protected function respondWithToken($tokenResult, User $user)
    {
        return response()->json([
            'token' => $tokenResult->plainTextToken,
            'user' => $user
        ], 200);
    }

    public function register(RegisterRequest $request)
    {
        $roles = ['Client', 'Collaborateur', 'Ingenieur'];
        $index = array_rand($roles);
        $user = User::create([
            'surname' => $request->surname,
            'name' => $request->name,
            'role' => $roles[$index],
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $tokenResult = $user->createToken(Str::random(15));

        return $this->respondWithToken($tokenResult, $user);
    }
}
