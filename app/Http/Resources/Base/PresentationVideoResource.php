<?php
/**
 * Created by IntelliJ IDEA.
 * User: mouedhen
 * Date: 04/04/18
 * Time: 01:53
 */

namespace App\Http\Resources\Base;


use Illuminate\Http\Resources\Json\Resource;

class PresentationVideoResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'url' => $this->url,
            'is_selected' => ($this->is_selected > 0 ? true : false),
        ];
    }
}