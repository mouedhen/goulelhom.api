<?php

namespace App\Models\Metrics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ReportTranslation extends Model
{
    use Notifiable;

    public $timestamps = false;
    protected $fillable = ['title', 'description'];
}
