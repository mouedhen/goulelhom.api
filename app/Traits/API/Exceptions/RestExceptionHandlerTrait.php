<?php

namespace App\Traits\API\Exceptions;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

trait RestExceptionHandlerTrait
{
    use RestAuthenticationExceptionTrait;
    use RestBadRequestExceptionTrait;
    use RestModelNotFoundExceptionTrait;
    use RestNotFoundExceptionTrait;
    use RestValidationExceptionTrait;

    /**
     * @param Request $request
     * @param \Exception|ValidationException $exception
     * @return JsonResponse
     */
    protected function getJsonResponse(Request $request, $exception): JsonResponse
    {
        switch (true) {
            case $this->isAuthenticationException($exception):
                return $this->authenticationException();
            case $this->isModelNotFoundException($exception):
                return $this->modelNotFoundException();
            case $this->isNotFoundException($exception):
                return $this->notFoundException();
            case $this->isValidationException($exception):
                return $this->validationException($data = $exception->errors());
            default:
                if (env('APP_ENV') !== 'production') {
                    return $this->badRequestException(
                        [
                            'message' => 'BAD REQUEST',
                            'code' => JsonResponse::HTTP_BAD_REQUEST,
                            'error' => $exception->getMessage(),
                            'class' => get_class($exception),
                            'trace' => $exception->getTrace(),
                        ],
                        JsonResponse::HTTP_BAD_REQUEST
                    );
                }
                return $this->badRequestException(
                    [
                        'message' => 'BAD REQUEST',
                        'code' => JsonResponse::HTTP_BAD_REQUEST,
                    ],
                    JsonResponse::HTTP_BAD_REQUEST
                );
        }
    }
}