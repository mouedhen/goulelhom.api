<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class PresentationVideo extends Model
{
    use LogsActivity;
    use Notifiable;

    protected $table = 'presentation_videos';
    protected $fillable = ['name', 'url', 'is_selected'];
    protected static $logFillable = true;

    public function currentVideo () {
        return $this->where('is_selected', '=', true)->last();
    }
}
