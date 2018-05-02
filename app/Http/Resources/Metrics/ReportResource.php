<?php

namespace App\Http\Resources\Metrics;


use App\Http\Resources\Helpers\MediaResource;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\App;

class ReportResource extends Resource
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
            'published_at' => (string) $this->published_at,
            'period_start_at' => (string) $this->period_start_at,
            'period_end_at' => (string) $this->period_end_at,
            'document' => ($this->document() ? env('APP_URL') . $this->document() : ''),
            'attachments' => MediaResource::collection($this->getMedia('documents')),
            'thumb' => ($this->thumb() ? env('APP_URL') . $this->thumb() : ''),
            'lang' => App::getLocale(),
            'translations' => [
                'en' => $this->hasTranslation('en'),
                'fr' => $this->hasTranslation('fr'),
                'ar' => $this->hasTranslation('ar'),
            ],
        ];
    }
}