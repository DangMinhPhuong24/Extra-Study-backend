<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyTime extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'study_times';
    protected $fillable = [
        'user_id',
        'weekday',
        'from_hour',
        'to_hour',
        'from_date',
        'to_date'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function registers()
    {
        return $this->hasMany(Register::class);
    }
}
