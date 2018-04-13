<?php

namespace App\Models\Base;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Slider extends Model implements HasMedia
{
    use LogsActivity;
    use HasMediaTrait;
    use Translatable;
    use Notifiable;

    protected $table = 'sliders';

    protected $fillable = ['quote', 'author', 'is_selected'];
    protected $translatedAttributes = ['quote', 'author'];
    protected $translationModel = SliderTranslation::class;

    protected static $logFillable = true;

    public function slide()
    {
        return $this->getFirstMediaUrl('sliders');
    }

    public function thumb()
    {
        return $this->getFirstMediaUrl('sliders', 'thumb');
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('sliders')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg' || $file->mimeType === 'image/png';
            })
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->width(800)
                    ->height(600);
            });
    }
}
