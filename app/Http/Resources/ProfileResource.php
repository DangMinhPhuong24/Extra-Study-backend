<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'avatar' => $this->avatar,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'role_name' => $this->roles->first()->display_name ?? null,
            'change_password_at' => format_date($this->change_password_at) ?? null
        ];
    }
}
