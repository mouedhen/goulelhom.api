<?php

namespace App\Http\Resources\Locations;

use App\Http\Resources\Helpers\MediaResource;
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
            'population' => $this->population,
            'houses' => $this->houses,
            'regional_council_number' => $this->regional_council_number,
            'municipal_council_number' => $this->municipal_council_number,
            'website' => $this->website,
            'phone' => $this->phone,
            'email' => $this->email,
            'fax' => $this->fax,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'is_active' => $this->is_active === 1,

            'city' => new CityStackedResource($this->city),
            // 'complains' => ComplainResource::collection($this->complains),

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
