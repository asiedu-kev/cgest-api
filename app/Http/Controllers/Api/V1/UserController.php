<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\User\UserCollection;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Api\ApiController;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends ApiController
{
    //

    public function index()
    {
        $query = User::where('id', '!=',auth()->user()->id);
        $users = QueryBuilder::for($query)->allowedIncludes(['user'])->paginate();
        return new UserCollection($users);
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
