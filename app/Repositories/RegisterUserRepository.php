<?php

namespace App\Repositories;

use App\Models\RegisterUser;
use Illuminate\Support\Facades\DB;

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
        'date'
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
        return $this->model->select(DB::raw('MIN(id) as id'), 'user_id', 'register_id')
            ->searchByRegisterId($registerId)
            ->groupBy('user_id', 'register_id')
            ->get();
    }
}
