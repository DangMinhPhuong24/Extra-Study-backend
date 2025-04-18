<?php

namespace App\Services;

use Illuminate\Http\Response;
use App\Http\Resources\RoleResource;
use App\Repositories\RoleRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

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
        $roleAll = Cache::remember('role_all', now()->addMinutes(10), function () {
            return $this->roleRepository->getAllAPI();
        });

        // $roleAll = $this->roleRepository->getAllAPI();
        // Redis::set('role_all', $roleAll);
        
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
