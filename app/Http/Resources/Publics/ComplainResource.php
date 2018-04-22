<?php

namespace App\Http\Resources\Publics;

use App\Http\Resources\Helpers\MediaResource;
use App\Http\Resources\Metrics\ThemeResource;
use App\Http\Resources\Stacked\MunicipalityStackedResource;
use App\Http\Resources\Stacked\ThemeStackedResource;
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
            'attachments' => MediaResource::collection($this->media),
            'theme' => new ThemeStackedResource($this->theme),
            'municipality' => new MunicipalityStackedResource($this->municipality),
        ];
    }
}
