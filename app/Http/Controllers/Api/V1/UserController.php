<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Api\ApiController;

class UserController extends ApiController
{
    //

    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {

        $request->validate([
            'surname' => 'required',
            'name' => 'required',
            'email' => 'required|unique|email',
            'password' => 'required',
        ]);

        return User::create($request->all());
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return $user;
    }

    public function destroy($id)
    {
        return User::destroy($id);
    }
}
