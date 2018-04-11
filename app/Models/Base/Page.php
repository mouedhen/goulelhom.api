<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class Page extends Model
{
    use LogsActivity;
    use Notifiable;

    protected $table = 'pages';
    protected $fillable = ['title', 'content', 'status'];
    protected static $logFillable = true;
}
