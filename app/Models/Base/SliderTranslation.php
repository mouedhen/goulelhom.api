<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SliderTranslation extends Model
{
    use Notifiable;

    public $timestamps = false;
    protected $fillable = ['quote', 'author'];
}
