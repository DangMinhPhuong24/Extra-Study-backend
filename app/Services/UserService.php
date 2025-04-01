<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /** @var UserRepository */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the User.
     *
     * @param $data
     * @return array
     */
    public function index($data)
    {
        $userIndex = $this->userRepository->searchUser($data);

        if ($userIndex) {
            $dataIndex = [
                'statusCode' => Response::HTTP_OK,
                'message' => __('messages.get.user.success'),
                'total_records' => $userIndex->total(),
                'total_pages' => $userIndex->lastPage(),
                'current_page' => $userIndex->currentPage(),
                'data' => UserResource::collection($userIndex)
            ];
        } else {
            $dataIndex = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.get.user.error')
            ];
        }
        return $dataIndex;
    }

    /**
     * Store a newly created User in storage.
     *
     * @param $dataCreate
     * @return array
     */
    public function store($dataCreate)
    {
        $dataCreate['password'] = Hash::make($dataCreate['password']);
        $userStore = $this->userRepository->storeAPI($dataCreate);

        if ($userStore) {
            $users = $this->userRepository->getOrderByPaginateAPI();

            $dataStore = [
                'statusCode' => Response::HTTP_CREATED,
                'message' => __('messages.post.user.success'),
                'total_records' => $users->total(),
                'total_pages' => $users->lastPage(),
                'current_page' => $users->currentPage(),
                'data' => new UserResource($userStore)
            ];
        } else {
            $dataStore = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.post.user.error')
            ];
        }
        return $dataStore;
    }

    /**
     * Display the specified User.
     *
     * @param $id
     * @return array
     */
    public function show($id)
    {
        $userShow = $this->userRepository->findOrFailAPI($id);
        if ($userShow) {
            $dataShow = [
                'statusCode' => Response::HTTP_OK,
                'message' => __('messages.get.user.success'),
                'data' => new UserResource($userShow)
            ];
        } else {
            $dataShow = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.get.user.error')
            ];
        }
        return $dataShow;
    }

    /**
     * Update the specified User in storage.
     *
     * @param $data
     * @return array
     */
    public function update($data)
    {
        $userUpdate = $this->userRepository->findOrFailAPI($data['id']);

        if ($userUpdate) {
            $data['change_password_at'] = $data['password'] ? now() : $userUpdate->change_password_at;
            $data['password'] = $data['password'] ? Hash::make($data['password']) : $userUpdate->password;

            $userUpdate->update($data);

            $dataUpdate = [
                'statusCode' => Response::HTTP_OK,
                'message' => __('messages.put.user.success'),
                'data' => new UserResource($userUpdate)
            ];
        } else {
            $dataUpdate = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.put.user.error')
            ];
        }
        return $dataUpdate;
    }

    /**
     * Remove the specified User from storage.
     *
     * @param $id
     * @return array
     */
    public function delete($id)
    {
        $userDelete = $this->userRepository->deleteAPI($id);
        
        if ($userDelete) {
            $users = $this->userRepository->getOrderByPaginateAPI();

            $dataDelete = [
                'statusCode' => Response::HTTP_OK,
                'message' => __('messages.delete.user.success'),
                'total_records' => $users->total(),
                'total_pages' => $users->lastPage(),
                'current_page' => $users->currentPage(),
                'data' => new UserResource($userDelete)
            ];
        } else {
            $dataDelete = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.delete.user.error')
            ];
        }
        return $dataDelete;
    }

    /**
     * Display all User.
     *
     * @return array
     */
    public function userAll()
    {
        $userAll = $this->userRepository->getAllAPI();
        if ($userAll) {
            $dataIndex = [
                'statusCode' => Response::HTTP_OK,
                'message' => __('messages.get.user.success'),
                'data' => UserResource::collection($userAll)
            ];
        } else {
            $dataIndex = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.get.user.error')
            ];
        }
        return $dataIndex;
    }

    /**
     * Display all User.
     *
     * @return array
     */
    public function teacherAll()
    {
        $teacherAll = $this->userRepository->getAllByRoleId(config('constants.role.teacher.id'));
        if ($teacherAll) {
            $dataAll = [
                'statusCode' => Response::HTTP_OK,
                'message' => __('messages.get.user.success'),
                'data' => UserResource::collection($teacherAll)
            ];
        } else {
            $dataAll = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.get.user.error')
            ];
        }
        return $dataAll;
    }
}
