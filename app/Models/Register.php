<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Register extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'registers';
    protected $fillable = [
        'subject_id',
        'class_name',
        'quantity',
        'registered_quantity',
        'study_time_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studyTime()
    {
        return $this->belongsTo(StudyTime::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function registerUser()
    {
        return $this->hasMany(RegisterUser::class);
    }

    /**
     * @param $query
     * @param $search
     * @return mixed
     */
    public function scopeSearchByClassName($query, $search)
    {
        if ($search) {
            return $query->where('class_name', 'like', '%' . $search . '%');
        }
        return $query;
    }

    /**
     * @param $query
     * @param $subjectId
     * @return mixed
     */
    public function scopeSearchBySubjectId($query, $subjectId): mixed
    {
        if ($subjectId) {
            $query->where('subject_id', $subjectId);
        }

        return $query;
    }

    /**
     * @param $query
     * @param $teacherId
     * @return mixed
     */
    public function scopeSearchByTeacherId($query, $teacherId): mixed
    {
        if ($teacherId) {
            $query->whereHas('studyTime', function ($q) use ($teacherId) {
                $q->where('study_times.user_id', $teacherId);
            });
        }

        return $query;
    }

    /**
     * @param $query
     * @param $teacherId
     * @return mixed
     */
    public function scopeSearchByStudyTime($query, $fromDate, $todate): mixed
    {
        if ($fromDate && $todate) {
            $query->whereHas('studyTime', function ($q) use ($fromDate, $todate) {
                $q->where('study_times.from_date', '>=', $fromDate)
                ->where('study_times.to_date', '<=', $todate);
            });
        }

        return $query;
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeFilterByRegisterUser($query): mixed
    {
        $userId = auth('api')->user()->id;
        return $query->whereHas('registerUser', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            });
    }
}
