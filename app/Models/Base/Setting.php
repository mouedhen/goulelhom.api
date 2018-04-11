<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class Setting extends Model
{
    use LogsActivity;
    use Notifiable;

    protected $table = 'settings';
    protected $fillable = ['key', 'value'];
    protected static $logFillable = true;
}
