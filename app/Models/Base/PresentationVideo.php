<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class PresentationVideo extends Model
{
    use LogsActivity;

    protected $table = 'presentation_videos';
    protected $fillable = ['title', 'url', 'is_selected'];
    protected static $logFillable = true;
}
