<?php

namespace App\Http\Resources\Publics;

use App\Http\Resources\Helpers\MediaResource;
use App\Http\Resources\Stacked\ContactStackedResource;
use App\Http\Resources\Stacked\SignatureStackedResource;
use App\Http\Resources\Stacked\ThemeStackedResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PetitionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'name' => $this->name,
            'description' => $this->description,
            'start_date' => (string) $this->start_date,
            'end_date' => (string) $this->end_date,
            'wasArchived' => $this->wasArchived(),
            'haveReachedObjective' => $this->haveReachedObjective(),
            'launched_by' => new ContactStackedResource($this->contact),
            'target' => $this->organization->name,
            'signatures' => $this->signatures->count(),
            'signatories' => SignatureStackedResource::collection($this->signatures),
            'theme' => new ThemeStackedResource($this->theme),
            'status' => $this->status,
            'requested_signatures_number' => $this->requested_signatures_number,
            'is_boosted' => ($this->is_boosted === 1),
            'attachments' => MediaResource::collection($this->media),
        ];
    }
}
