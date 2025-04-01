<?php

namespace App\Http\Controllers\API;

use App\Services\RoleService;
use App\Http\Controllers\AppBaseController;

class RoleController extends AppBaseController
{
    /** @var RoleService */
    protected $roleService;
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function roleAll()
    {
        $roles = $this->roleService->roleAll();
        return $this->sentResponse(
            $roles['statusCode'],
            $roles['message'],
            $roles['data'] ?? []
        );
    }
}
