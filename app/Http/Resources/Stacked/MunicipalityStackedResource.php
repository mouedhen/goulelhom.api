<?php
/**
 * Created by PhpStorm.
 * User: mouedhen
 * Date: 20/04/18
 * Time: 05:53
 */

namespace App\Http\Resources\Stacked;


use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\App;

class MunicipalityStackedResource extends Resource
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
            'lang' => App::getLocale(),
        ];
    }
}