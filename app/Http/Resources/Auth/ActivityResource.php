<?php
/**
 * Created by PhpStorm.
 * User: mouedhen
 * Date: 19/03/18
 * Time: 17:32
 */

namespace App\Http\Resources\Auth;


use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'subject' => $this->subject,
            'subject_type' => $this->subject_type,
            'causer' => $this->causer,
            'date' => $this->updated_at,
            'properties' => $this->properties,
        ];
    }
}