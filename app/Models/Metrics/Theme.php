<?php

namespace App\Models\Metrics;

use App\Models\Complains\Complain;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $color
 * @property Complain[] $complains
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Theme extends Model implements HasMedia
{
    use LogsActivity;
    use HasMediaTrait;
    use Translatable;
    use Notifiable;

    protected static $logFillable = true;

    protected $fillable = ['name', 'description', 'color',];
    protected $translatedAttributes = ['name', 'description',];
    protected $translationModel = ThemeTranslation::class;

    public function complains()
    {
        return $this->hasMany(Complain::class);
    }

    public function cover()
    {
        return $this->getFirstMediaUrl('covers');
    }

    public function miniature()
    {
        return $this->getFirstMediaUrl('miniatures');
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('attachments')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumbs')
                    ->width(600)
                    ->height(600);
            });
        $this
            ->addMediaCollection('covers')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg' || $file->mimeType === 'image/png';
            })
            ->singleFile();
        $this
            ->addMediaCollection('miniatures')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg' || $file->mimeType === 'image/png';
            })
            ->singleFile();
    }
}
