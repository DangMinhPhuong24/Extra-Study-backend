<?php

namespace App\Repositories;

use App\Models\Role;

/**
 * Class RoleRepository
 */
class RoleRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'role_name',
        'display_name'
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
        return Role::class;
    }
}
