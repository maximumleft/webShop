<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $userData): void
    {
        User::firstOrCreate([
            'email' => $userData['email'],
        ], $userData);
    }

    public function update(User $user, array $userData): void
    {
        $user->update($userData);
    }

    public function delete(User $user): bool
    {
        return $user->update(['deleted_at' => now()]);
    }
}
