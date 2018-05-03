<?php

namespace App\Http\Resources\Metrics;

use App\Http\Resources\Helpers\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class ThemeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        try {
            $name = $this->translate(App::getLocale(), true)->name;
            $description = $this->translate(App::getLocale(), true)->description;
        } catch (\Exception $exception) {
            $name = $this->name;
            $description = $this->description;
            logger()->warning('[' . date('L') . '][WARNING]' . $exception->getMessage());
        }

        return [
            'id' => $this->id,
            'name' => $name,
            'description' => $description,
            'color' => $this->color,
            'cover' => ($this->cover() ? env('APP_URL') . $this->cover() : ''),
            'miniature' => ($this->miniature() ? env('APP_URL') . $this->miniature() : ''),
            'attachments' => MediaResource::collection($this->getMedia('attachments')),

            'lang' => App::getLocale(),
            'translations' => [
                'en' => $this->hasTranslation('en'),
                'fr' => $this->hasTranslation('fr'),
                'ar' => $this->hasTranslation('ar'),
            ],
        ];
    }
}
