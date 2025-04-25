<?php

declare(strict_types=1);

namespace App\Dtos\User;

use App\Enums\UserRoleEnum;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

final class UserStoreDto extends Data
{
    /**
     * Creates a new UserStoreDto instance with user details for storage.
     *
     * @param string $name The user's full name.
     * @param string $email The user's email address.
     * @param string $password The user's password.
     * @param UserRoleEnum $role The user's assigned role.
     */
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public UserRoleEnum $role
    ) {}

    /**
     * Returns validation rules for storing a new user.
     *
     * @return array Associative array of validation rules for name, email, password, and role.
     */
    public static function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', Rule::enum(UserRoleEnum::class)],
        ];
    }
}
