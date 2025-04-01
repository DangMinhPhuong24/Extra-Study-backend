<?php

namespace App\Http\Controllers\API;

use App\Services\RegisterService;
use App\Http\Controllers\AppBaseController;

class RegisterController extends AppBaseController
{
    /** @var RegisterService */
    protected $registerService;
    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function registerAll()
    {
        $registers = $this->registerService->registerAll();
        return $this->sentResponse(
            $registers['statusCode'],
            $registers['message'],
            $registers['data'] ?? []
        );
    }
}
