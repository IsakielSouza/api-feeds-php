<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return UserResource::collection($users);
    }

    public function store(StoreUpdateUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        return new UserResource($user);
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return new UserResource($user);
    }

    public function update(StoreUpdateUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user->update($data);


        return new UserResource($user);
    }
}
