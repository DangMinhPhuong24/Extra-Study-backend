<?php

namespace App\Http\Controllers\API;

use App\Services\ChatService;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;

class ChatController extends AppBaseController
{
    /** @var ChatService */
    protected $chatService;
    public function __construct(ChatService $chatService)
    {
        $this->chatService = $chatService;
    }

    public function store(Request $request)
    {
        $chat = $this->chatService->store($request->all());

        return $this->sentResponse(
            $chat['statusCode'],
            $chat['message'],
            $chat['data'] ?? []
        );
    }

    public function chatAll(Request $request)
    {
        $chats = $this->chatService->chatAll($request->all());
        return $this->sentResponse(
            $chats['statusCode'],
            $chats['message'],
            $chats['data'] ?? []
        );
    }
}
