<?php
/**
 * Created by PhpStorm.
 * User: mouedhen
 * Date: 23/04/18
 * Time: 02:56
 */

namespace App\Http\Resources\Stacked;


use Illuminate\Http\Resources\Json\Resource;

class ContactStackedResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => decrypt($this->name),
        ];
    }
}