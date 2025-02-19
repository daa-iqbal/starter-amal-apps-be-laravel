<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return UserResource::collection($users);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'avatar' => 'nullable',
            'username' => 'required|string|max:20|unique:users,username',
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'role' => 'required|string|max:255',
            'phone_number' => 'nullable|string',
            'status' => 'nullable|integer'
        ]);

        // Avatar
        if ($request->hasFile('avatar')) {
            $avatarName = time() . '-' . $request->username . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('avatars'), $avatarName);
            $data['avatar'] = $avatarName;
        }

        $user = User::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'User Created Successfully',
            'data' => new UserResource($user)
        ]);
    }

    public function show(User $user)
    {
        return response()->json([
            'data' => new UserResource($user)
        ]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'avatar' => 'nullable',
            'username' => 'required|string|max:20',
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'role' => 'required|string|max:255',
            'phone_number' => 'nullable|string',
            'status' => 'nullable|integer'
        ]);

        // Avatar
        if ($request->hasFile('avatar')) {
            $avatarName = time() . '-' . $user->username . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('avatars'), $avatarName);
            $data['avatar'] = $avatarName;
        }

        // Username Unique
        $existingUsername = User::where('username', $data['username'])->where('id', '<>', $user->id)->first();
        if ($existingUsername) {
            return response()->json([
                'status' => 'error',
                'message' => 'Username Already Exists',
                'data' => null
            ], 422);
        }

        // Email Unique
        $existingEmail = User::where('email', $data['email'])->where('id', '<>', $user->id)->first();
        if ($existingEmail) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email Already Exists',
                'data' => null
            ], 422);
        }

        $user->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'User Edited Successfully',
            'data' => new UserResource($user)
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'User Deleted Successfully'
        ]);
    }
}
