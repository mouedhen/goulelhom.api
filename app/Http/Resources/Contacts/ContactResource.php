<?php

namespace App\Http\Resources\Contacts;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            'name' => decrypt($this->name),
            'email' => ($this->email ? decrypt($this->email) : $this->email),
            'phone_number' => ($this->phone_number ? decrypt($this->phone_number) : $this->phone_number),
            'address' => ($this->address ? decrypt($this->address) : $this->address),
        ];
    }
}
