<?php

namespace App\Http\Resources\Base;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\App;

class SliderResource extends Resource
{
    public function toArray($request)
    {
        try {
            $quote = $this->translate(App::getLocale(), true)->quote;
            $author = $this->translate(App::getLocale(), true)->author;
        } catch (\Exception $exception) {
            $quote = $this->quote;
            $author = $this->author;
            logger()->warning('[' . date('L') . '][WARNING]' . $exception->getMessage());
        }
        return [
            'id' => $this->id,
            'quote' => $quote,
            'author' => $author,
            'lang' => App::getLocale(),
            'is_selected' => ($this->is_selected > 0 ? true : false),
            'slide' => ($this->slide() ? env('APP_URL') . $this->slide() : ''),
            'thumb' => ($this->thumb() ? env('APP_URL') . $this->thumb() : ''),
            'translations' => [
                'en' => $this->hasTranslation('en'),
                'fr' => $this->hasTranslation('fr'),
                'ar' => $this->hasTranslation('ar'),
            ],
        ];
    }
}