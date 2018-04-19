<?php

namespace App\Models\Contacts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class OrganizationTranslation extends Model
{
    use Notifiable;

    public $timestamps = false;
    protected $fillable = ['name', 'description'];
}
