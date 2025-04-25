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
    /**
     * Creates a new user with the provided data and returns a JSON response.
     *
     * On success, returns the created user resource with HTTP status 201. If an error occurs during user creation, returns a generic error response.
     *
     * @param UserStoreDto $data Data for creating the user.
     * @return JsonResponse JSON response containing the created user or an error message.
     */
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
