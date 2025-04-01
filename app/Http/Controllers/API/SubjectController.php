<?php

namespace App\Http\Controllers\API;

use App\Services\SubjectService;
use App\Http\Controllers\AppBaseController;

class SubjectController extends AppBaseController
{
    /** @var SubjectService */
    protected $subjectService;
    public function __construct(SubjectService $subjectService)
    {
        $this->subjectService = $subjectService;
    }

    public function subjectAll()
    {
        $subjects = $this->subjectService->subjectAll();
        return $this->sentResponse(
            $subjects['statusCode'],
            $subjects['message'],
            $subjects['data'] ?? []
        );
    }
}
