<?php

namespace App\Dtos\Auth;

use Spatie\LaravelData\Data;

class AuthRequestDto extends Data
{
    public function __construct(
        public string $email,
        public string $password,
    ){}

    public static function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'string'],
        ];
    }
}
