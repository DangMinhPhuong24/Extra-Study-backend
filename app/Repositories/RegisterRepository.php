<?php

namespace App\Repositories;

use App\Models\Register;

/**
 * Class RegisterRepository
 */
class RegisterRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'subject_id',
        'class_name',
        'quantity',
        'registered_quantity',
        'study_time_id'
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
        return Register::class;
    }

    /**
     * Update Register increment registered_quantity
     *
     * @param $register
     * @return mixed
     */
    public function incrementRegisteredQuantity($register)
    {
        return $register->update([
            'registered_quantity' => $register->registered_quantity + config('constants.one')
        ]);
    }

    /**
     * Update Register decrement registered_quantity
     *
     * @param $register
     * @return mixed
     */
    public function decrementRegisteredQuantity($register)
    {
        return $register->update([
            'registered_quantity' => $register->registered_quantity - config('constants.one')
        ]);
    }
}
