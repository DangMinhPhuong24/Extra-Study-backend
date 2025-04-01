<?php

namespace App\Services;

use App\Http\Resources\SubjectResource;
use App\Repositories\SubjectRepository;
use Illuminate\Http\Response;

class SubjectService
{
    /** @var SubjectRepository */
    protected $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    /**
     * Display all Subject.
     *
     * @return array
     */
    public function subjectAll()
    {
        $subjectAll = $this->subjectRepository->getAllAPI();
        if ($subjectAll) {
            $dataIndex = [
                'statusCode' => Response::HTTP_OK,
                'message' => __('messages.get.subject.success'),
                'data' => SubjectResource::collection($subjectAll)
            ];
        } else {
            $dataIndex = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.get.subject.error')
            ];
        }
        return $dataIndex;
    }
}
