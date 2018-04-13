<?php
/**
 * Created by PhpStorm.
 * User: mouedhen
 * Date: 13/04/18
 * Time: 02:44
 */

namespace App\Http\Resources\Helpers;


use Illuminate\Http\Resources\Json\Resource;

class MediaResource extends Resource
{
    public function toArray($request)
    {
        return [
            'media' => env('APP_URL') . $this->getUrl(),
        ];
    }
}