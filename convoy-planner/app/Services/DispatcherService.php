<?php

namespace App\Services;

use App\Contracts\DispatcherContract;
use App\Models\Dispatcher;

class DispatcherService implements DispatcherContract
{
    public function create($dispatcher)
    {
        return Dispatcher::create($dispatcher);
    }

    public function getByUserId($id)
    {
        return Dispatcher::where('user_id', $id)->first();
    }
}
