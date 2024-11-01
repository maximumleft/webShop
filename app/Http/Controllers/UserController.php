<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    ){
    }

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
        $this->userRepository->create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully!'
        ]);
    }

    public function update(User $user, UserUpdateRequest $request): JsonResponse
    {
        $data = $request->validated();
        $this->userRepository->update($user, $data);

        return response()->json([
            'status' => 'success',
            'message' => 'User updated successfully!'
        ]);
    }

    public function delete(User $user): JsonResponse
    {
        $this->userRepository->delete($user);

        return response()->json([
            'status' => 'success',
            'message' => 'User deleted successfully!'
        ]);
    }
}
