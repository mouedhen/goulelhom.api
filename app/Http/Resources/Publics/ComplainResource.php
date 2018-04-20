<?php

namespace App\Http\Resources\Publics;

use App\Http\Resources\Metrics\ThemeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ComplainResource extends JsonResource
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
            'subject' => $this->subject,
            'description' => $this->description,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'attachment' => $this->media,
            'theme' => new ThemeResource($this->theme),
            'municipality' => new ThemeResource($this->municipality),
        ];
    }
}
