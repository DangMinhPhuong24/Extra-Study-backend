<?php

namespace App\Services;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepository;
use App\Repositories\RegisterRepository;
use App\Http\Resources\RegisterUserResource;
use App\Repositories\RegisterUserRepository;
use App\Http\Resources\DetailRegisterUserResource;

class RegisterUserService
{
    /** @var RegisterUserRepository */
    protected $registerUserRepository;

    /** @var RegisterRepository */
    protected $registerRepository;

    /** @var UserRepository */
    protected $userRepository;

    public function __construct(
        RegisterUserRepository $registerUserRepository,
        RegisterRepository $registerRepository,
        UserRepository $userRepository
    ) {
        $this->registerUserRepository = $registerUserRepository;
        $this->registerRepository = $registerRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the User.
     *
     * @param $data
     * @return array
     */
    public function index()
    {
        $registerUsers = $this->registerUserRepository->getAllByUserId(auth('api')->user()->id);

        if ($registerUsers) {
            $dataIndex = [
                'statusCode' => Response::HTTP_OK,
                'message' => __('messages.get.registerUser.success'),
                'data' => RegisterUserResource::collection($registerUsers)
            ];
        } else {
            $dataIndex = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.get.registerUser.error')
            ];
        }
        return $dataIndex;
    }

    /**
     * Store a newly created RegisterUser in storage.
     *
     * @param $data
     * @return array
     */
    public function store($data)
    {
        $user = auth('api')->user()->id;
        if ($user) {
            foreach ($data['register_ids'] as $registerId) {
                $dataCreateRegisterUser = [
                    'register_id' => $registerId,
                    'user_id' => auth('api')->user()->id,
                ];
                $registerUser = $this->registerUserRepository->storeAPI($dataCreateRegisterUser);

                $register = $this->registerRepository->findOrFailAPI($registerId);
                $this->registerRepository->incrementRegisteredQuantity($register);
            }

            $dataStore = [
                'statusCode' => Response::HTTP_CREATED,
                'message' => __('messages.post.registerUser.success'),
                'data' => new RegisterUserResource($registerUser)
            ];
        } else {
            $dataStore = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.post.user.not_found')
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
        $registerUserShow = $this->registerUserRepository->getAllByRegisterId($id);

        if ($registerUserShow) {
            $dataShow = [
                'statusCode' => Response::HTTP_OK,
                'message' => __('messages.get.registerUser.success'),
                'data' => DetailRegisterUserResource::collection($registerUserShow)
            ];
        } else {
            $dataShow = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.get.registerUser.error')
            ];
        }
        return $dataShow;
    }

    /**
     * Update the specified RegisterUser in storage.
     *
     * @param $data
     * @return array
     */
    public function update($data)
    {
        DB::beginTransaction();

        try {
            $user = auth('api')->user();

            if ($user) {
                foreach ($user->registerUser as $registerUser) {
                    $register = $this->registerRepository->findOrFailAPI($registerUser->register_id);
                    $this->registerRepository->decrementRegisteredQuantity($register);
                }
                $user->registerUser()->forceDelete();

                foreach ($data['register_ids'] as $registerId) {
                    $dataCreateRegisterUser = [
                        'register_id' => $registerId,
                        'user_id' => auth('api')->user()->id,
                    ];
                    $registerUser = $this->registerUserRepository->storeAPI($dataCreateRegisterUser);

                    $register = $this->registerRepository->findOrFailAPI($registerId);
                    $this->registerRepository->incrementRegisteredQuantity($register);
                }

                $dataUpdate = [
                    'statusCode' => Response::HTTP_OK,
                    'message' => __('messages.put.registerUser.success'),
                    'data' => new RegisterUserResource($registerUser)
                ];
            } else {
                $dataUpdate = [
                    'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'message' => __('messages.post.user.not_found')
                ];
            }

            DB::commit();

            return $dataUpdate;
        } catch (\Exception $e) {
            DB::rollBack();

            return [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.put.registerUser.error')
            ];
        }
    }

    /**
     * Display the specified User.
     *
     * @param $id
     * @return array
     */
    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $registerUserDelete = $this->registerUserRepository->deleteAPI($id);

            if ($registerUserDelete) {
                $register = $this->registerRepository->findOrFailAPI($registerUserDelete->register_id);
                $this->registerRepository->decrementRegisteredQuantity($register);

                $dataDelete = [
                    'statusCode' => Response::HTTP_OK,
                    'message' => __('messages.delete.registerUser.success')
                ];
            } else {
                $dataDelete = [
                    'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'message' => __('messages.delete.registerUser.error')
                ];
            }

            DB::commit();

            return $dataDelete;
        } catch (\Exception $e) {
            DB::rollBack();

            return [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.delete.registerUser.error')
            ];
        }
    }
}
