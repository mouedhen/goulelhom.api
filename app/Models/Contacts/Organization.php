<?php

namespace App\Models\Contacts;

use App\Models\Petitions\Petition;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{


    public function petitions()
    {
        return $this->hasMany(Petition::class);
    }
}
