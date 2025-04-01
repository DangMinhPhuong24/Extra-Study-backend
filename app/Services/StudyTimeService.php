<?php

namespace App\Services;

use App\Http\Resources\StudyTimeResource;
use App\Repositories\StudyTimeRepository;
use Illuminate\Http\Response;

class StudyTimeService
{
    /** @var StudyTimeRepository */
    protected $studyTimeRepository;

    public function __construct(StudyTimeRepository $studyTimeRepository)
    {
        $this->studyTimeRepository = $studyTimeRepository;
    }

    /**
     * Display all StudyTime.
     *
     * @return array
     */
    public function studyTimeAll()
    {
        $studyTimeAll = $this->studyTimeRepository->getAllAPI();
        if ($studyTimeAll) {
            $dataIndex = [
                'statusCode' => Response::HTTP_OK,
                'message' => __('messages.get.studyTime.success'),
                'data' => StudyTimeResource::collection($studyTimeAll)
            ];
        } else {
            $dataIndex = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.get.studyTime.error')
            ];
        }
        return $dataIndex;
    }
}
