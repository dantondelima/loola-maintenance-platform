<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Dtos\User\UserStoreDto;
use App\Models\User;

final class CreateUserService
{
    public function handle(UserStoreDto $data): User
    {
        return User::create($data->toArray());
    }
}
