<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegisterUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'register_user';
    protected $fillable = [
        'register_id',
        'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function register()
    {
        return $this->belongsTo(Register::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param $query
     * @param $userId
     * @return mixed
     */
    public function scopeSearchByUserId($query, $userId)
    {
        if (!empty($userId)) {
            return $query->where('user_id', $userId);
        }

        return $query;
    }

    /**
     * @param $query
     * @param $registerId
     * @return mixed
     */
    public function scopeSearchByRegisterId($query, $registerId)
    {
        if (!empty($registerId)) {
            return $query->where('register_id', $registerId);
        }

        return $query;
    }
}
