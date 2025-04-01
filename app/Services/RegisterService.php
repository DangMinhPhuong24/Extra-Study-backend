<?php

namespace App\Services;

use App\Http\Resources\RegisterResource;
use App\Repositories\RegisterRepository;
use Illuminate\Http\Response;

class RegisterService
{
    /** @var RegisterRepository */
    protected $registerRepository;

    public function __construct(RegisterRepository $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }

    /**
     * Display all Register.
     *
     * @return array
     */
    public function registerAll()
    {
        $registerAll = $this->registerRepository->getAllAPI();
        if ($registerAll) {
            $dataIndex = [
                'statusCode' => Response::HTTP_OK,
                'message' => __('messages.get.register.success'),
                'data' => RegisterResource::collection($registerAll)
            ];
        } else {
            $dataIndex = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.get.register.error')
            ];
        }
        return $dataIndex;
    }
}
