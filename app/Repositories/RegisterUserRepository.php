<?php

namespace App\Repositories;

use App\Models\RegisterUser;

/**
 * Class RegisterUserRepository
 */
class RegisterUserRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'register_id',
        'user_id',
    ];

    /**
     * Return searchable fields
     *
     * @return array|string[]
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     *
     * @return string
     */
    public function model()
    {
        return RegisterUser::class;
    }

    /**
     * Get All RegisterUser by user_id
     *
     * @param $userId
     * @return mixed
     */
    public function getAllByUserId($userId)
    {
        return $this->model->searchByUserId($userId)->get();
    }

    /**
     * Get All RegisterUser by register_id
     *
     * @param $registerId
     * @return mixed
     */
    public function getAllByRegisterId($registerId)
    {
        return $this->model->searchByRegisterId($registerId)->get();
    }
}
