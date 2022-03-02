<?php

namespace App\Services;

use App\Contracts\UserContract;
use App\Models\User;

class UserService implements UserContract
{
    public function create($user)
    {
        $user['password'] = bcrypt($user['password']);
        return User::create($user);
    }
}
