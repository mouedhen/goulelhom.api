<?php

namespace App\Traits\API\Exceptions;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait RestNotFoundExceptionTrait
{
    /**
     * Check if the given exception is an Eloquent Model Not Found Exception.
     *
     * @param \Exception $exception
     * @return bool
     */
    protected function isNotFoundException(\Exception $exception): bool
    {
        return $exception instanceof NotFoundHttpException;
    }

    /**
     * Return a json response for Eloquent Model Not Found Exception
     *
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    protected function notFoundException(string $message = 'Not found.',
                                              int $statusCode = JsonResponse::HTTP_NOT_FOUND): JsonResponse
    {
        return response()->json(['message' => $message, 'code' => $statusCode], $statusCode);
    }
}