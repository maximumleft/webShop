<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function create(array $userData): void;

    public function update(User $user, array $userData): void;

    public function delete(User $user);
}
