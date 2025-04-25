<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class UserResource extends JsonResource
{
    /**
     * Transforms the user resource into an array for JSON serialization.
     *
     * Returns an array containing the user's ID, name, email, status, and role value.
     *
     * @return array Associative array representing the user resource.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->status,
            'role' => $this->role->value,
        ];
    }
}
