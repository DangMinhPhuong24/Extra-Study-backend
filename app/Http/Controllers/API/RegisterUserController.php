<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\RegisterUser\RegisterUserAPIRequest;
use App\Services\RegisterUserService;
use App\Http\Controllers\AppBaseController;

class RegisterUserController extends AppBaseController
{
    /** @var RegisterUserService */
    protected $registerUserService;
    public function __construct(RegisterUserService $registerUserService)
    {
        $this->registerUserService = $registerUserService;
    }

    public function index()
    {
        $registerUsers = $this->registerUserService->index();

        return $this->sentResponse(
            $registerUsers['statusCode'],
            $registerUsers['message'],
            $registerUsers['data'] ?? []
        );
    }

    public function store(RegisterUserAPIRequest $request)
    {
        $registerUser = $this->registerUserService->store($request->all());

        return $this->sentResponse(
            $registerUser['statusCode'],
            $registerUser['message'],
            $registerUser['data'] ?? []
        );
    }

    public function show(RegisterUserAPIRequest $request)
    {
        $registerUser = $this->registerUserService->show($request['id']);

        return $this->sentResponse(
            $registerUser['statusCode'],
            $registerUser['message'],
            $registerUser['data'] ?? []
        );
    }

    public function update(RegisterUserAPIRequest $request)
    {
        $registerUser = $this->registerUserService->update($request->all());
        return $this->sentResponse(
            $registerUser['statusCode'],
            $registerUser['message'],
            $registerUser['data'] ?? []
        );
    }

    public function destroy(RegisterUserAPIRequest $request)
    {
        $registerUser = $this->registerUserService->delete($request['id']);

        return $this->sentResponse(
            $registerUser['statusCode'],
            $registerUser['message'],
            $registerUser['data'] ?? []
        );
    }
}
