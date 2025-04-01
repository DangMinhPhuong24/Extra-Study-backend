<?php

namespace App\Repositories;

use App\Models\StudyTime;

/**
 * Class StudyTimeRepository
 */
class StudyTimeRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'user_id',
        'weekday',
        'from_hour',
        'to_hour',
        'from_date',
        'to_date'
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
        return StudyTime::class;
    }
}
