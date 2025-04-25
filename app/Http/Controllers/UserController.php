<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Dtos\User\UserStoreDto;
use App\Http\Resources\UserResource;
use App\Services\CreateUserService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class UserController extends BaseController
{
    public function store(UserStoreDto $data, CreateUserService $service): JsonResponse
    {
        try {
            $user = $service->handle($data);

            return $this->respondCreated(new UserResource($user));
        } catch (Exception $e) {
            report($e);

            return $this->respondWithError();
        }
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
