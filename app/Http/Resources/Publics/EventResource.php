<?php

namespace App\Http\Resources\Publics;

use App\Http\Resources\Helpers\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class EventResource extends JsonResource
{
    public function toArray($request)
    {
        try {
            $title = $this->translate(App::getLocale(), true)->title;
            $description = $this->translate(App::getLocale(), true)->description;
        } catch (\Exception $exception) {
            $title = $this->title;
            $description = $this->description;
            logger()->warning('[' . date('L') . '][WARNING]' . $exception->getMessage());
        }
        return [
            'id' => $this->id,
            'title' => $title,
            'description' => $description,
            'attachments' => MediaResource::collection($this->media),
            'start_date' => (string) $this->start_date,
            'end_date' => (string) $this->end_date,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'lang' => App::getLocale(),
        ];
    }
}
