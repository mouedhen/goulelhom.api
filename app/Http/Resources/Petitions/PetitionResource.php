<?php

namespace App\Http\Resources\Petitions;

use App\Http\Resources\Contacts\ContactResource;
use App\Http\Resources\Helpers\MediaResource;
use App\Http\Resources\Stacked\MunicipalityStackedResource;
use App\Http\Resources\Stacked\SignatureStackedResource;
use App\Http\Resources\Stacked\ThemeStackedResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\Resource;

class PetitionResource extends JsonResource
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
            'name' => $this->name,
            'uuid' => $this->uuid,
            'description' => $this->description,
            'requested_signatures_number' => $this->requested_signatures_number,
            'status' => $this->status,

            'is_new' => $this->is_new === 1,
            'is_moderated' => $this->is_moderated === 1,
            'is_valid' => $this->is_valid === 1,
            'has_approved_sworn_statement' => $this->has_approved_sworn_statement === 1,
            'has_approved_term_of_use' => $this->has_approved_term_of_use === 1,
            'is_boosted' => $this->is_boosted === 1,

            'created_at' => (string)$this->created_at,
            'start_date' => (string)$this->start_date,
            'end_date' => (string)$this->end_date,

            'attachments' => MediaResource::collection($this->media),

            'contact' => new ContactResource($this->contact),
            'theme' => new ThemeStackedResource($this->theme),
            'organization' => new Resource($this->organization),

            'wasArchived' => $this->wasArchived(),
            'haveReachedObjective' => $this->haveReachedObjective(),
            'signatures' => $this->signatures->count(),
            'signatories' => SignatureStackedResource::collection($this->signatures),
        ];
    }
}
