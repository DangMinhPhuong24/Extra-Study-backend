<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;
    public $sender;
    public $content;
    public $created_at;
    /**
     * Create a new event instance.
     */
    public function __construct($id, $sender, $content, $created_at)
    {
        $this->id = $id;
        $this->sender = [
            'id' => $sender->id,
            'name' => $sender->name,
        ];
        $this->content = $content;
        $this->created_at = $created_at;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PresenceChannel('chat'),
        ];
    }

    public function broadcastWith() {
        return [
            'id' => $this->id,
            'sender' => $this->sender,
            'content' => $this->content,
            'created_at' => $this->created_at
        ];
    }
}
