<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

final class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected int $statusCode = Response::HTTP_OK;

    protected array $headers = [];

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;

        return $this;
    }

    protected function respond(array|JsonResource $data = [], array $headers = []): JsonResponse
    {
        if ($data instanceof JsonResource) {
            $data = $data->response()->getData(true);
        }

        return response()->json($data, $this->getStatusCode(), $headers ?: $this->headers);
    }

    protected function respondWithSuccess(array|JsonResource $data = []): JsonResponse
    {
        return $this->respond($data);
    }

    protected function respondNoContent(): JsonResponse
    {
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    protected function respondWithError(?string $message = 'Something went wrong', array $errors = []): JsonResponse
    {
        if ($this->statusCode < 400) {
            $this->setStatusCode(Response::HTTP_BAD_REQUEST);
        }

        return $this->respond([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors,
        ]);
    }
}
