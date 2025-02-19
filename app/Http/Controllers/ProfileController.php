<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class ProfileController extends Controller
{
    public function profile(User $user)
    {
        $user = auth()->user();

        return response()->json([
            'data' => new UserResource($user)
        ]);
    }

    public function editprofile(Request $request)
    {
        $data = $request->validate([
            'avatar' => 'nullable',
            'username' => 'required|string|max:20',
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'nullable|string'
        ]);

        // Avatar
        if ($request->hasFile('avatar')) {
            $avatarName = time() . '-' . auth()->user()->username . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('avatars'), $avatarName);
            $data['avatar'] = $avatarName;
        }

        // Username Unique
        $existingUsername = User::where('username', $data['username'])->where('id', '<>', auth()->id())->first();
        if ($existingUsername) {
            return response()->json([
                'status' => 'error',
                'message' => 'Username Already Exists',
                'data' => null
            ], 422);
        }

        // Email Unique
        $existingEmail = User::where('email', $data['email'])->where('id', '<>', auth()->id())->first();
        if ($existingEmail) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email Already Exists',
                'data' => null
            ], 422);
        }

        $findUser = auth()->user();
        $user = User::find($findUser->id);
        $user->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Profile Edited Successfully',
            'data' => new UserResource($user)
        ]);
    }
}
