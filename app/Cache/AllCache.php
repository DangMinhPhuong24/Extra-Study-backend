<?php

namespace App\Cache;

use App\Repositories\RegisterRepository;
use App\Repositories\RoleRepository;
use App\Repositories\StudyTimeRepository;
use App\Repositories\SubjectRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Cache;

class AllCache
{
    /** @var RoleRepository */
    protected $roleRepository;

    /** @var UserRepository */
    protected $userRepository;

    /** @var RegisterRepository */
    protected $registerRepository;

    /** @var SubjectRepository */
    protected $subjectRepository;

    /** @var StudyTimeRepository */
    protected $studyTimeRepository;

    public function __construct(RoleRepository $roleRepository, 
                                UserRepository $userRepository,
                                RegisterRepository $registerRepository,
                                SubjectRepository $subjectRepository,
                                StudyTimeRepository $studyTimeRepository,
    )
    {
        $this->roleRepository = $roleRepository;
        $this->userRepository = $userRepository;
        $this->registerRepository = $registerRepository;
        $this->subjectRepository = $subjectRepository;
        $this->studyTimeRepository = $studyTimeRepository;
    }

    public function cac() 
    {
        Cache::remember('user_all', now()->addMinutes(10), function () {
            return $this->userRepository->getAllAPI();
        });

        Cache::remember('role_all', now()->addMinutes(10), function () {
            return $this->roleRepository->getAllAPI();
        });

        Cache::remember('register_all', now()->addMinutes(10), function () {
            return $this->registerRepository->getAllAPI();
        });

        Cache::remember('teacher_all', now()->addMinutes(10), function () {
            return $this->userRepository->getAllByRoleId(config('constants.role.teacher.id'));
        });

        Cache::remember('subject_all', now()->addMinutes(10), function () {
            return $this->subjectRepository->getAllAPI();
        });

        Cache::remember('study_time_all', now()->addMinutes(10), function () {
            return $this->studyTimeRepository->getAllAPI();
        });
    }
}