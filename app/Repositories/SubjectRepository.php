<?php

namespace App\Repositories;

use App\Models\Subject;

/**
 * Class SubjectRepository
 */
class SubjectRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'code',
        'subject_name',
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
        return Subject::class;
    }
}
