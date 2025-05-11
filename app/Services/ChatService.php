<?php

namespace App\Services;

use App\Events\MessageSent;
use Illuminate\Http\Response;
use App\Http\Resources\ChatResource;
use App\Repositories\ChatRepository;

class ChatService
{
    /** @var ChatRepository */
    protected $chatRepository;

    public function __construct(ChatRepository $chatRepository)
    {
        $this->chatRepository = $chatRepository;
    }

    /**
     * Create Chat
     * @param $data
     * @return array
     */
    public function store($data)
    {
        $data['sender_id'] = auth('api')->user()->id;

        broadcast(new MessageSent($data['sender_id'], $data['content']));

        $chatStore = $this->chatRepository->storeAPI($data);

        if ($chatStore) {
            $dataStore = [
                'statusCode' => Response::HTTP_CREATED,
                'message' => __('messages.post.chat.success'),
                'data' => new ChatResource($chatStore)
            ];
        } else {
            $dataStore = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.post.chat.error')
            ];
        }
        return $dataStore;
    }

    /**
     * Display all Chat.
     * 
     * @param $data
     * @return array
     */
    public function chatAll($data)
    {
        $chatAll = $this->chatRepository->getBySenderIdAndReceiverId(auth('api')->user()->id, $data['receiver_id']);
        
        if ($chatAll) {
            $dataIndex = [
                'statusCode' => Response::HTTP_OK,
                'message' => __('messages.get.chat.success'),
                'data' => ChatResource::collection($chatAll)
            ];
        } else {
            $dataIndex = [
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => __('messages.get.chat.error')
            ];
        }
        return $dataIndex;
    }
}
