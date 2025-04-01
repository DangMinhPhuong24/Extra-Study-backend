<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'avatar' => $this->avatar,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'role' => [
                'id'=> $this->role_id,
                'display_name'=> $this->role->display_name ?? null,
            ],
            'login_at' => $this->login_at ?? 'Chưa có lần đăng nhập',
            'change_password_at'=> $this->change_password_at ? Carbon::parse($this->change_password_at)->format('H:i:s d/m/Y') : 'Chưa thay đổi mật khẩu',
        ];
    }
}
