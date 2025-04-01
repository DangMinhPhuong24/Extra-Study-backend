<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Handle rendering various exceptions and return the corresponding JSON response.
     *
     * @param $request
     * @param Throwable $exception
     * @return \Illuminate\Http\JsonResponse|Response|\Symfony\Component\HttpFoundation\Response
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException || $exception instanceof NotFoundHttpException) {
            return $this->jsonResponse(Response::HTTP_NOT_FOUND,
                $exception instanceof ModelNotFoundException
                ? __('messages.error.model_not_found')
                : __('messages.error.page_not_found'));
        }

        if ($exception instanceof AuthorizationException) {
            return $this->jsonResponse(Response::HTTP_FORBIDDEN,
                __('messages.error.forbidden'));
        }

        return parent::render($request, $exception);
    }

    /**
     * Create a JsonResponse object with specific status code and message.
     *
     * @param int $statusCode
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function jsonResponse(int $statusCode, string $message)
    {
        return response()->json([
            'status_code' => $statusCode,
            'message' => $message,
        ], $statusCode);
    }
}
