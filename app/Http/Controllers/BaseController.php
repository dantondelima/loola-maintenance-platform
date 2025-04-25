<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected int $statusCode = Response::HTTP_OK;

    protected array $headers = [];

    /**
     * Retrieves the current HTTP status code for the response.
     *
     * @return int The HTTP status code.
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Sets the HTTP status code for the response.
     *
     * @param int $statusCode The HTTP status code to use.
     * @return self Returns the current instance for method chaining.
     */
    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Retrieves the current HTTP headers set for the response.
     *
     * @return array The array of HTTP headers.
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Sets the HTTP headers for the response.
     *
     * @param array $headers Associative array of HTTP headers to include in responses.
     * @return self Returns the current instance for method chaining.
     */
    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * Returns a JSON response with the given data, status code, and headers.
     *
     * If the data is a JsonResource, it is converted to an array before responding.
     *
     * @param array|JsonResource $data The response data or a JsonResource instance.
     * @param array $headers Optional HTTP headers to include in the response.
     * @return JsonResponse The JSON response.
     */
    protected function respond(array|JsonResource $data = [], array $headers = []): JsonResponse
    {
        if ($data instanceof JsonResource) {
            $data = $data->response()->getData(true);
        }

        return response()->json($data, $this->getStatusCode(), $headers ?: $this->headers);
    }

    /**
     * Returns a JSON response indicating a successful operation with the provided data.
     *
     * @param array|JsonResource $data Optional data to include in the response.
     * @return JsonResponse JSON response with a 200 OK status.
     */
    protected function respondWithSuccess(array|JsonResource $data = []): JsonResponse
    {
        return $this->respond($data);
    }

    /**
     * Returns a JSON response with HTTP status 201 (Created) and the provided data.
     *
     * @param array|JsonResource $data Data to include in the response body.
     * @return JsonResponse JSON response with status code 201.
     */
    protected function respondCreated(array|JsonResource $data = []): JsonResponse
    {
        $this->setStatusCode(Response::HTTP_CREATED);

        return $this->respond($data);
    }

    /**
     * Returns a JSON response with a 204 No Content status and no data.
     *
     * @return JsonResponse Empty JSON response with HTTP 204 status.
     */
    protected function respondNoContent(): JsonResponse
    {
        $this->setStatusCode(Response::HTTP_NO_CONTENT);

        return $this->respond();
    }

    /**
     * Returns a JSON error response with a message and optional error details.
     *
     * If the current status code is below 400, it is set to 400 (Bad Request) before responding.
     *
     * @param string|null $message Error message to include in the response.
     * @param array $errors Optional array of additional error details.
     * @return JsonResponse JSON response containing error information.
     */
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
