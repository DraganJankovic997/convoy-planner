<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\DriverContract;
use App\Contracts\UserContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterDriverRequest;
use Illuminate\Support\Arr;

class RegisterDriverController extends Controller
{
    private $userService;
    private $driverService;

    public function __construct(UserContract $userService, DriverContract $driverService)
    {
        $this->userService = $userService;
        $this->driverService = $driverService;
    }

    public function register(RegisterDriverRequest $request)
    {
        $clean = $request->validated();

        $user = $this->userService->create(Arr::only($clean, [
            'first_name',
            'last_name',
            'email',
            'phone',
            'password',
        ]));

        return $this->driverService->create(array_merge(
            ['user_id' => $user['id']],
            Arr::only($clean, [
                'licence_number',
                'hired_from',
                'dispatcher_id',
            ])
        ));
    }
}
