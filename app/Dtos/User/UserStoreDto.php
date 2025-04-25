<?php

declare(strict_types=1);

namespace App\Dtos\User;

use App\Enums\UserRoleEnum;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

final class UserStoreDto extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $role
    ) {}

    public static function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', Rule::in(UserRoleEnum::cases())],
        ];
    }
}
