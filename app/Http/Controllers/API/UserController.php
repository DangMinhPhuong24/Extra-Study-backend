<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\User\UserAPIRequest;
use App\Services\UserService;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;

class UserController extends AppBaseController
{
    /** @var UserService */
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $users = $this->userService->index($request->all());

        return $this->sentResponseIndex(
            $users['statusCode'],
            $users['message'],
            $users['total_records'] ?? '',
            $users['total_pages'] ?? '',
            $users['current_page'] ?? '',
            $users['data'] ?? []
        );
    }

    public function store(UserAPIRequest $request)
    {
        $user = $this->userService->store($request->all());

        return $this->sentResponseIndex(
            $user['statusCode'],
            $user['message'],
            $user['total_records'] ?? '',
            $user['total_pages'] ?? '',
            $user['current_page'] ?? '',
            $user['data'] ?? []
        );
    }

    public function show($id)
    {
        $user = $this->userService->show($id);
        return $this->sentResponse(
            $user['statusCode'],
            $user['message'],
            $user['data'] ?? []
        );
    }

    public function update(UserAPIRequest $request)
    {
        $user = $this->userService->update($request->all());
        return $this->sentResponse(
            $user['statusCode'],
            $user['message'],
            $user['data'] ?? []
        );
    }

    public function destroy(UserAPIRequest $request)
    {
        $user = $this->userService->delete($request['id']);
        return $this->sentResponseIndex(
            $user['statusCode'],
            $user['message'],
            $user['total_records'] ?? '',
            $user['total_pages'] ?? '',
            $user['current_page'] ?? '',
            $user['data'] ?? []
        );
    }

    
    public function userAll()
    {
        $users = $this->userService->userAll();
        return $this->sentResponse(
            $users['statusCode'],
            $users['message'],
            $users['data'] ?? []
        );
    }

    public function teacherAll()
    {
        $users = $this->userService->teacherAll();
        return $this->sentResponse(
            $users['statusCode'],
            $users['message'],
            $users['data'] ?? []
        );
    }
}
