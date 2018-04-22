<?php

namespace App\Http\Resources\Locations;

use App\Http\Resources\Publics\ComplainResource;
use App\Http\Resources\Stacked\CityStackedResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class MunicipalityResource extends JsonResource
{
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
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'city' => new CityStackedResource($this->city),
            'complains' => ComplainResource::collection($this->complains),
            'lang' => App::getLocale(),
            'translations' => [
                'en' => $this->hasTranslation('en'),
                'fr' => $this->hasTranslation('fr'),
                'ar' => $this->hasTranslation('ar'),
            ],
        ];
    }
}
