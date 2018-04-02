<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'avatar' => $this->avatar(),
            'roles' => RoleResource::collection($this->roles),
            'activity' => $this->activity->sortByDesc('created_at'),
            'actions' => $this->actions->sortByDesc('created_at'),
        ];
    }
}
