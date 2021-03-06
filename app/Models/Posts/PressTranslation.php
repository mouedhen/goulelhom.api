<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PressTranslation extends Model
{
    use Notifiable;

    public $timestamps = false;
    protected $fillable = ['name', 'description'];
}
