<?php

declare(strict_types=1);

namespace App\Services;

use App\Dtos\User\UserStoreDto;
use App\Models\User;

final class CreateUserService
{
    /**
     * Creates and returns a new User model from the provided data transfer object.
     *
     * @param UserStoreDto $data Data for the new user.
     * @return User The newly created User model instance.
     */
    public function handle(UserStoreDto $data): User
    {
        return User::create($data->toArray());
    }
}
