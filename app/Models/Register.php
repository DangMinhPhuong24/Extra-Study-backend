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
}
