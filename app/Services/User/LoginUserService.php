<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Dtos\Auth\AuthRequestDto;
use Illuminate\Support\Facades\Auth;

class LoginUserService
{
    public function handle(AuthRequestDto $data): bool
    {
        return Auth::attempt($data->toArray());
    }
}
