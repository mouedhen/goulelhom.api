<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Page extends Model
{
    use LogsActivity;

    protected $table = 'pages';
    protected $fillable = ['title', 'content', 'status'];
    protected static $logFillable = true;
}
