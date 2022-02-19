<?php

namespace App\Services;

use App\Contracts\DriverContract;
use App\Models\Driver;
use Carbon\Carbon;

class DriverService implements DriverContract
{
    public function create($driver)
    {
        $driver['hired_from'] = Carbon::parse($driver['hired_from']);
        return Driver::create($driver);
    }
}
