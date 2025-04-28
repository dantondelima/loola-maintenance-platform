<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PingController;
use App\Http\Controllers\UserController;

Route::get('ping', [PingController::class, 'ping']);

Route::post('users', [UserController::class, 'store'])->name('users.store');
