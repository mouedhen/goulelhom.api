<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EventTranslation extends Model
{
    use Notifiable;

    public $timestamps = false;
    protected $fillable = ['title', 'description'];
}
