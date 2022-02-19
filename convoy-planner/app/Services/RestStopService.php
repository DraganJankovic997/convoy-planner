<?php

namespace App\Services;

use App\Contracts\RestStopContract;
use App\Models\RestStop;

class RestStopService implements RestStopContract
{
    public function create($restStop)
    {
        return RestStop::create($restStop);
    }
}
