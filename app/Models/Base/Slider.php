<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Slider extends Model implements HasMedia
{
    use HasMediaTrait;
    use LogsActivity;

    protected $table = 'sliders';
    protected $fillable = ['quote', 'author'];
    protected static $logFillable = true;
}
