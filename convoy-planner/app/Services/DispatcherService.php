<?php

namespace App\Services;

use App\Contracts\DispatcherContract;
use App\Models\Dispatcher;
use App\Models\User;

class DispatcherService implements DispatcherContract
{
    public function create($dispatcher)
    {
        return Dispatcher::create($dispatcher);
    }
}
