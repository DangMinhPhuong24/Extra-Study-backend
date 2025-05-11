<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'sender' => [
                'id' => $this->sender_id,
                'name' => $this->sender->name ?? null,
            ],
            'receiver' => [
                'id' => $this->receiver_id,
                'name' => $this->receiver->name ?? null,
            ],
            'content' => $this->content,
            'created_at' => format_date_time($this->created_at)
        ];
    }
}
