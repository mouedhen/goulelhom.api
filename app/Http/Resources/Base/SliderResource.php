<?php

namespace App\Http\Resources\Base;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\App;

class SliderResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'quote' => $this->translate(App::getLocale(), true)->quote,
            'author' => $this->translate(App::getLocale(), true)->author,
            'is_selected' => ($this->is_selected > 0 ? true : false),
            // 'media' => $this->media,
            'slide' => ($this->slide() ? env('APP_URL') . $this->slide() : ''),
            // 'thumb' => $this->thumb(),
            // 'translations' => $this->translations,
        ];
    }
}