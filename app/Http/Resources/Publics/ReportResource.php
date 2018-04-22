<?php

namespace App\Http\Resources\Publics;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class ReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        try {
            $title = $this->translate(App::getLocale(), true)->title;
            $description = $this->translate(App::getLocale(), true)->description;
        } catch (\Exception $exception) {
            $title = $this->title;
            $description = $this->description;
            logger()->warning('[' . date('L') . '][WARNING]' . $exception->getMessage());
        }
        return [
            'id' => $this->id,
            'title' => $title,
            'description' => $description,
            'published_at' => (string) $this->published_at,
            'period_start_at' => (string) $this->period_start_at,
            'period_end_at' => (string) $this->period_end_at,
            'document' => ($this->document() ? env('APP_URL') . $this->document() : ''),
            'document_uri' => $this->document(),
            'thumb' => ($this->thumb() ? env('APP_URL') . $this->thumb() : ''),
            'thumb_uri' => $this->thumb(),
            'lang' => App::getLocale(),
        ];
    }
}
