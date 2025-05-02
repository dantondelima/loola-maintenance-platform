<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class UserResource extends JsonResource
{
    private bool $withToken = false;

    public function withToken(): self
    {
        $this->withToken = true;

        return $this;
    }

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->status,
            'role' => $this->role->value,
            $this->mergeWhen($this->withToken, [
                'token' => $this->generateToken(),
            ]),
        ];
    }

    public function generateToken(): string
    {
        return $this->createToken('auth_token')->plainTextToken;
    }
}
