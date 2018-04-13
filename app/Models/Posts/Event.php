<?php

namespace App\Models\Posts;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Event extends Model
{
    use LogsActivity;
    use HasMediaTrait;
    use Translatable;
    use Notifiable;

    protected $table = 'events';

    protected $fillable = ['title', 'description', 'start_date', 'end_date', 'longitude', 'latitude',];
    protected $dates = ['start_date', 'end_date', 'created_at', 'updated_at',];
    protected $translatedAttributes = ['title', 'description'];
    protected $translationModel = EventTranslation::class;

    protected static $logFillable = true;

    public function media()
    {
        return $this->getFirstMediaUrl('events');
    }

    public function thumb()
    {
        return $this->getFirstMediaUrl('events', 'thumb');
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('events')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->width(600)
                    ->height(600);
            });
    }
}
