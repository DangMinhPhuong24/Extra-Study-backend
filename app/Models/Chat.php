<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'chats';
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'content'
    ];

   /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }

    /**
     * @param $query
     * @param $senderId
     * @return mixed
     */
    public function scopeWhereBySenderId($query, $senderId): mixed
    {
        return $query->where('sender_id', $senderId);
    }

    /**
     * @param $query
     * @param $receiverId
     * @return mixed
     */
    public function scopeWhereByReceiverId($query, $receiverId): mixed
    {
        return $query->where('receiver_id', $receiverId);
    }
}
