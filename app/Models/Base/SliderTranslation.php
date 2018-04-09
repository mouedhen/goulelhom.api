<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['quote', 'author'];
}
