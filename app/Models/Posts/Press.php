<?php

namespace App\Models\Posts;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $url
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Press extends Model implements HasMedia
{
    use LogsActivity;
    use HasMediaTrait;
    use Translatable;
    use Notifiable;

    protected static $logFillable = true;

    protected $fillable = ['name', 'description', 'url',];
    protected $translatedAttributes = ['name', 'description',];
    protected $translationModel = PressTranslation::class;

    public function miniature()
    {
        return $this->getFirstMediaUrl('miniatures');
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('miniatures')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg' || $file->mimeType === 'image/png';
            })
            ->singleFile();
    }
}
