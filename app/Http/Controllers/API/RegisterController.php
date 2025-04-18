<?php

namespace App\Http\Controllers\API;

use App\Services\RegisterService;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;

class RegisterController extends AppBaseController
{
    /** @var RegisterService */
    protected $registerService;
    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function index(Request $request)
    {
        $registers = $this->registerService->index($request->all());

        return $this->sentResponseIndex(
            $registers['statusCode'],
            $registers['message'],
            $registers['total_records'] ?? '',
            $registers['total_pages'] ?? '',
            $registers['current_page'] ?? '',
            $registers['data'] ?? []
        );
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
