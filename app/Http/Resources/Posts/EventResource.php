<?php

namespace App\Http\Resources\Posts;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\App;

class EventResource extends Resource
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
            'start_date' => (string) $this->start_date,
            'end_date' => (string) $this->end_date,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'media' => $this->media,
            'lang' => App::getLocale(),
            'translations' => [
                'en' => $this->hasTranslation('en'),
                'fr' => $this->hasTranslation('fr'),
                'ar' => $this->hasTranslation('ar'),
            ],
        ];
    }
}