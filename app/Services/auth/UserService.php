<?php

namespace App\Services\auth;

use App\Models\User;

class UserService
{
    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(array $data, $user): void
    {
        $user->update($data);
    }

    public function destroy($user): void
    {
        $user->delete();
    }
}