<?php

namespace App\Http\Controllers;

use App\Dtos\Auth\AuthRequestDto;
use App\Http\Resources\UserResource;
use App\Services\User\LoginUserService;
use App\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends BaseController
{
    public function login(AuthRequestDto $request, LoginUserService $service): JsonResponse   
    {
        try {
            if (!$service->handle($request)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            return $this->respondWithSuccess((new UserResource(auth()->user()))->withToken());
        } catch (\Throwable $e) {
            report($e);

            return $this->respondWithError();
        }
    }

    public function logout(Request $request): JsonResponse
    {
        try {
            $request->user()->currentAccessToken()->delete();

            return $this->respondNoContent();
        } catch (\Throwable $e) {
            report($e);

            return $this->respondWithError();
        }
    }
}
