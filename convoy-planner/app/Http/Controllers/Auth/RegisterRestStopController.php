<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\RestStopContract;
use App\Contracts\UserContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRestStopRequest;
use Illuminate\Support\Arr;

class RegisterRestStopController extends Controller
{
    private $userService;
    private $restStopService;

    public function __construct(UserContract $userService, RestStopContract $restStopService)
    {
        $this->userService = $userService;
        $this->restStopService = $restStopService;
    }

    public function register(RegisterRestStopRequest $request)
    {
        $clean = $request->validated();

        $user = $this->userService->create(Arr::only($clean, [
            'first_name',
            'last_name',
            'email',
            'phone',
            'password',
        ]));

        return $this->restStopService->create(array_merge(
            ['user_id' => $user['id']],
            Arr::only($clean, [
                'address',
                'work_from',
                'work_to',
                'work_sunday',
                'work_saturday',
            ])
        ));
    }
}
