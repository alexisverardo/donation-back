<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('blood_type', 'province', 'location')->get();

        return Response::json($users->jsonSerialize(), 200);
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::query()->create($request->all());

        return Response::json($user->jsonSerialize(), 201);
    }

    public function show($id)
    {
        $user = User::query()->findOrFail($id)->with('blood_type', 'province', 'location')->get();

        return Response::json($user->jsonSerialize(), 200);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::query()->findOrFail($id);

        $user->fill($request->all());
        $user->save();

        return Response::json($user->jsonSerialize(), 200);
    }

    public function destroy($id)
    {
        User::query()->findOrFail($id)->delete();

        return Response::json(['status' => 'ok'], 200);
    }
}
