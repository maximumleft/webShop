<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function show(User $user): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'user' => $user
        ]);
    }

    public function create(UserStoreRequest $request): JsonResponse
    {
        $data = $request->validated();
        User::firstOrCreate([
            'email' => $data['email'],
        ], $data);

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully!'
        ]);
    }

    public function update(User $user, UserUpdateRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'User updated successfully!'
        ]);
    }

    public function delete(User $user): JsonResponse
    {
        $user->update(['deleted_at' => now()]);

        return response()->json([
            'status' => 'success',
            'message' => 'User deleted successfully!'
        ]);
    }
}
