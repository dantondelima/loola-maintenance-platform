<?php

declare(strict_types=1);

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PingController;
use App\Http\Controllers\UserController;

Route::get('ping', [PingController::class, 'ping']);

Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::post('users/login', [AuthController::class, 'login'])->name('users.login');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('users/me', [UserController::class, 'me']);
    Route::post('users/logout', [AuthController::class, 'logout']);
});
