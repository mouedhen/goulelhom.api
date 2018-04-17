<?php

namespace App\Models\Locations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MunicipalityTranslation extends Model
{
    use Notifiable;

    public $timestamps = false;
    protected $fillable = ['name', 'description'];
}
