<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\DispatcherContract;
use App\Contracts\RouteContract;

class RouteController extends Controller
{
    private $dispatcherService;
    private $routeService;


    public function __construct(DispatcherContract $dispatcherService, RouteContract $routeService)
    {
        $this->dispatcherService = $dispatcherService;
        $this->routeService = $routeService;
    }

    public function createRoute(Request $request)
    {
        if (!$this->dispatcherService->getById(Auth::id())) {
            return response('You are unable to create routes!', 403);
        }

        $clean = $request->validate([
            'from_date' => ['required', 'date_format:d-m-Y', 'after:today'],
            'to_date' => ['required', 'date_format:d-m-Y', 'after:today'],
            'town_from' => ['required', 'exists:town'],
            'town_to' => ['required', 'exists:town'],
        ]);

        return $this->routeService->create(array_merge(
            $clean,
            ['dispatcher_id' => Auth::id()]
        ));
    }
}
