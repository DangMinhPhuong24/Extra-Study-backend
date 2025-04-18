<?php

namespace App\Services;

use Illuminate\Http\Response;
use App\Helpers\PaginationHelper;
use App\Http\Resources\RegisterResource;
use App\Repositories\RegisterRepository;

class RegisterService
{
    /** @var RegisterRepository */
    protected $registerRepository;

    public function __construct(RegisterRepository $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }

    /**
     * Display a listing of the User.
     *
     * @param $data
     * @return array
     */
    public function index($data)
    {
        $registerIndex = $this->registerRepository->searchRegister($data);

        if ($registerIndex) {
            $dataIndex = [
                'statusCode' => Response::HTTP_OK,
                'message' =>  __('messages.get.register.success'),
                'data' => RegisterResource::collection($registerIndex)
            ];

            PaginationHelper::formatPaginationData($registerIndex, $dataIndex);
        } else {
            $dataIndex = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.get.register.error')
            ];
        }
        return $dataIndex;
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
