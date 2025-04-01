<?php

namespace App\Http\Controllers\API;

use App\Services\StudyTimeService;
use App\Http\Controllers\AppBaseController;

class StudyTimeController extends AppBaseController
{
    /** @var StudyTimeService */
    protected $studyTimeService;
    public function __construct(StudyTimeService $studyTimeService)
    {
        $this->studyTimeService = $studyTimeService;
    }

    public function studyTimeAll()
    {
        $studyTimes = $this->studyTimeService->studyTimeAll();
        return $this->sentResponse(
            $studyTimes['statusCode'],
            $studyTimes['message'],
            $studyTimes['data'] ?? []
        );
    }
}
