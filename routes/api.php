<?php

declare(strict_types=1);

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('ping', [PingController::class, 'ping']);

Route::group(['middleware' => ['throttle:api']], function () {
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::post('users/login', [AuthController::class, 'login'])->name('users.login');

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('users/me', [UserController::class, 'me']);
        Route::post('users/logout', [AuthController::class, 'logout']);
    });
});
