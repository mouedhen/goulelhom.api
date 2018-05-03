<?php

namespace App\Http\Resources\Complains;

use App\Http\Resources\Contacts\ContactResource;
use App\Http\Resources\Helpers\MediaResource;
use App\Http\Resources\Stacked\MunicipalityStackedResource;
use App\Http\Resources\Stacked\ThemeStackedResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ComplainResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'subject' => $this->subject,
            'description' => $this->description,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,

            'is_new' => $this->is_new === 1,
            'is_moderated' => $this->is_moderated === 1,
            'is_valid' => $this->is_valid === 1,
            'has_approved_sworn_statement' => $this->has_approved_sworn_statement === 1,
            'has_approved_term_of_use' => $this->has_approved_term_of_use === 1,

            'created_at' => (string)$this->created_at,

            'attachments' => MediaResource::collection($this->media),

            'contact' => new ContactResource($this->contact),
            'theme' => new ThemeStackedResource($this->theme),
            'municipality' => new MunicipalityStackedResource($this->municipality),

            'complain' => new \App\Http\Resources\Publics\ComplainResource($this->complain),
            'complains' => \App\Http\Resources\Publics\ComplainResource::collection($this->complains),
        ];
    }
}
