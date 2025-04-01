<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user' => [
                'id' => $this['user']->id,
                'name' => $this['user']->name,
                'username' => $this['user']->username,
                'email' => $this['user']->email,
                'role_name' => $this['user']->role->role_name ?? null,
                'role_display_name' => $this['user']->role->display_name ?? null,
            ],
            'token_type' => 'Bearer',
            'token' => $this['token'],
            'expires_in_token' => config('jwt.ttl'),
        ];
    }
}
