<?php

namespace App\Repositories;

use App\Models\Chat;

/**
 * Class ChatRepository
 */
class ChatRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'sender_id',
        'receiver_id',
        'content'
    ];

    /**
     * Return searchable fields
     *
     * @return array|string[]
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    public function getBySenderIdAndReceiverId($senderId, $receiverId) {

        return $this->model->where(function($query) use ($senderId, $receiverId) {
            $query->whereBySenderId($senderId)
                  ->whereByReceiverId($receiverId);
        })->orWhere(function($query) use ($senderId, $receiverId) {
            $query->whereBySenderId($receiverId)
                  ->whereByReceiverId($senderId);
        })->orderBy('id', 'asc')->get();
    }

    /**
     * Configure the Model
     *
     * @return string
     */
    public function model()
    {
        return Chat::class;
    }
}
