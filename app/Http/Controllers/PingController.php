<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PingController extends BaseController
{
    public function ping(Request $request): JsonResponse
    {
        return $this->respondWithSuccess([
            'data' => [
                'status' => 'OK',
            ],
        ]);
    }
}
