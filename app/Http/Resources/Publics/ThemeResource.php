<?php

namespace App\Http\Resources\Publics;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class ThemeResource extends JsonResource
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
            'color' => $this->color,
            'claims_count' => $this->complains->count(),
            'lang' => App::getLocale(),
        ];
    }
}
