<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\User\LoginAPIRequest;
use App\Http\Requests\User\UserAPIRequest;

class AuthController extends AppBaseController
{
    /** @var AuthService */
    protected $authService;
    public function __construct(AuthService $authService)
    {
        $this->middleware('jwt_auth', ['except' => ['login']]);
        $this->authService = $authService;
    }

    public function login(LoginAPIRequest $request): mixed
    {
        $login = $this->authService->login($request);

        return $this->sentResponse(
            $login['statusCode'],
            $login['message'],
            $login['data'] ?? []
        );
    }

    public function logout()
    {
        $logout = $this->authService->logoutWithToken();

        return $this->sentResponse(
            $logout['statusCode'],
            $logout['message']
        );
    }

    public function profile()
    {
        $profile = $this->authService->profile();

        return $this->sentResponse(
            $profile['statusCode'],
            $profile['message'],
            $profile['data'] ?? []
        );
    }

    public function updateProfile(UserAPIRequest $request)
    {
        $updateProfile = $this->authService->updateProfile($request->all());
        return $this->sentResponse(
            $updateProfile['statusCode'],
            $updateProfile['message'],
            $updateProfile['data'] ?? []
        );
    }
}
