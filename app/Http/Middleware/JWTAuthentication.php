<?php

namespace App\Http\Middleware;

use App\Http\Controllers\AppBaseController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTAuthentication extends AppBaseController
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            if ($e instanceof TokenExpiredException) {
                return $this->sentResponseToken(
                    Response::HTTP_UNAUTHORIZED,
                    __('messages.error.token.expired'),
                    Response::HTTP_UNAUTHORIZED
                );

            } elseif ($e instanceof TokenInvalidException) {
                return $this->sentResponseToken(
                    Response::HTTP_UNAUTHORIZED,
                    __('messages.error.token.invalid'),
                    Response::HTTP_UNAUTHORIZED
                );
            } else {
                return $this->sentResponseToken(
                    Response::HTTP_UNAUTHORIZED,
                    __('messages.error.token.not_found'),
                    Response::HTTP_UNAUTHORIZED
                );
            }
        }
        return $next($request);
    }
}
