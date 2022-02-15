<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterDispatcherRequest;

class RegisterDispatcherController extends Controller
{
    public function register(RegisterDispatcherRequest $request)
    {
        $clean = $request->validated();

        return 'all good';
    }
}
