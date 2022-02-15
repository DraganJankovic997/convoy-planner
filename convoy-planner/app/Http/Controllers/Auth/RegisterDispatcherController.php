<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\DispatcherContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterDispatcherRequest;
use App\Contracts\UserContract;
use Illuminate\Support\Arr;

class RegisterDispatcherController extends Controller
{
    private $userService;
    private $dispatcherService;

    public function __construct(UserContract $userService, DispatcherContract $dispatcherService)
    {
        $this->userService = $userService;
        $this->dispatcherService = $dispatcherService;
    }

    public function register(RegisterDispatcherRequest $request)
    {
        $clean = $request->validated();

        $user = Arr::only($clean, ['first_name', 'last_name', 'email', 'phone', 'password']);

        $user = $this->userService->create($user);

        $dispatcher = Arr::only($clean, ['name', 'registration_number', 'address']);

        $dispatcher['user_id'] = $user['id'];

        return $this->dispatcherService->create($dispatcher);
    }
}
