<?php

namespace App\Services;

use App\Contracts\RouteContract;
use App\Models\Route;
use Carbon\Carbon;

class RouteService implements RouteContract
{
    public function create($route)
    {
        $route['to_date'] = Carbon::parse($route['to_date']);
        $route['from_date'] = Carbon::parse($route['from_date']);
        return Route::create($route);
    }
}
