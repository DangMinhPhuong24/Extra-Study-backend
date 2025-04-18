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
     * Search for User and select by Role model records
     *
     * @param $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchRegister($data)
    {
        $query = $this->model->newQuery();
        if($data['register_user'] != null) {
            $query->filterByRegisterUser();
        }

        return $query->searchByClassName($data['class_name'] ?? null)
            ->searchBySubjectId($data['subject_id'] ?? null)
            ->searchByTeacherId($data['teacher_id'] ?? null)
            ->searchByStudyTime($data['from_date'] ?? null, $data['to_date'] ?? null)
            ->paginate(config('constants.paginate'));
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
