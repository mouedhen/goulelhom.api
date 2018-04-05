<?php

namespace App\Http\Resources\Base;

use Illuminate\Http\Resources\Json\Resource;

class SliderResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'quote' => $this->quote,
            'author' => $this->author,
            'is_selected' => ($this->is_selected > 0 ? true : false),
            'media' => $this->media,
            'slide' => ($this->slide() ? env('APP_URL') . $this->slide() : ''),
            'thumb' => $this->thumb(),
        ];
    }
}