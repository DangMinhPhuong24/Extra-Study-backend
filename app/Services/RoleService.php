<?php

namespace App\Services;

use App\Http\Resources\RoleResource;
use App\Repositories\RoleRepository;
use Illuminate\Http\Response;

class RoleService
{
    /** @var RoleRepository */
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display all Role.
     *
     * @return array
     */
    public function roleAll()
    {
        $roleAll = $this->roleRepository->getAllAPI();
        if ($roleAll) {
            $dataIndex = [
                'statusCode' => Response::HTTP_OK,
                'message' => __('messages.get.role.success'),
                'data' => RoleResource::collection($roleAll)
            ];
        } else {
            $dataIndex = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.get.role.error')
            ];
        }
        return $dataIndex;
    }
}
