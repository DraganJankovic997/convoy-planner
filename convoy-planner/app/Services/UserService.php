<?php

namespace App\Services;

use App\Contracts\UserContract;
use App\Models\User;

class UserService implements UserContract
{
    public function create($user)
    {
        return User::create($user);
    }
}
