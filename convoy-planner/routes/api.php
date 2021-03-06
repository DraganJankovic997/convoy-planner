<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterDispatcherController;
use App\Http\Controllers\Auth\RegisterDriverController;
use App\Http\Controllers\Auth\RegisterRestStopController;
use App\Http\Controllers\RouteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(
    ['middleware' => 'api', 'prefix' => 'auth'],
    function ($router) {
        Route::post('login', [ AuthController::class, 'login' ]);
        Route::post('logout', [ AuthController::class, 'logout' ]);
        Route::post('refresh', [ AuthController::class, 'refresh' ]);
        Route::post('me', [ AuthController::class, 'me' ]);
    }
);

Route::post('auth/register/dispatcher', [ RegisterDispatcherController::class, 'register' ]);
Route::post('auth/register/driver', [ RegisterDriverController::class, 'register' ]);
Route::post('auth/register/reststop', [ RegisterRestStopController::class, 'register' ]);


Route::post('route', [RouteController::class, 'createRoute']);
