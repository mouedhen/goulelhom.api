<?php

namespace App\Http\Resources\Publics;

use App\Http\Resources\Helpers\MediaResource;
use App\Http\Resources\Stacked\CityStackedResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class MunicipalityDetailsResource extends JsonResource
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
            'population' => $this->population,
            'houses' => $this->houses,
            'municipal_council_number' => $this->municipal_council_number,
            'regional_council_number' => $this->regional_council_number,



            'city' => new CityStackedResource($this->city),
            'complains' => ComplainResource::collection($this->complains),
            'attachments' => MediaResource::collection($this->media),
            'lang' => App::getLocale(),
        ];
    }
}
