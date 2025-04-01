<?php

namespace App\Repositories;

use App\Models\User;

/**
 * Class UserRepository
 */
class UserRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'avatar',
        'name',
        'username',
        'email',
        'password',
        'role_id'
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
        return User::class;
    }

    /**
     * Search for User and select by Role model records
     *
     * @param $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchUser($data)
    {
        return $this->model->searchByName($data['search'] ?? null)
            ->searchByRoleId($data['role_id'] ?? null)
            ->latest('id')
            ->paginate(config('constants.paginate'));
    }

    /**
     * Check username when login
     *
     * @param $username
     * @return mixed
     */
    public function checkUsernameAPI($username)
    {
        return $this->model->searchByUsername($username)->first();
    }

    /**
     * Get all user by role_id
     *
     * @param $roleId
     * @return mixed
     */
    public function getAllByRoleId($roleId)
    {
        return $this->model->searchByRoleId($roleId)->get();
    }
}
