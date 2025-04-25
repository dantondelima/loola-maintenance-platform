<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\UserRoleEnum;
use App\States\User\Created;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

final class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        $role = fake()->randomElement(UserRoleEnum::cases());

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => self::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => $role->value,
            'status' => Created::$name,
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
