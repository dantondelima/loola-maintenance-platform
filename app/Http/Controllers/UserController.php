<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Dtos\User\UserStoreDto;
use App\Http\Resources\UserResource;
use App\Services\User\CreateUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

final class UserController extends BaseController
{
    public function store(UserStoreDto $data, CreateUserService $service): JsonResponse
    {
        try {
            $user = $service->handle($data);

            return $this->respondCreated((new UserResource($user))->withToken());
        } catch (Throwable $e) {
            report($e);

            return $this->respondWithError();
        }
    }

    public function me()
    {
        try {
            return $this->respondWithSuccess((new UserResource(auth()->user())));
        } catch (Throwable $e) {
            report($e);

            return $this->respondWithError();
        }
    }

    public function update(Request $request, string $id)
    {
        //
    }
}
