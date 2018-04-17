<?php

namespace App\Models\Locations;

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
 * @property integer $population
 * @property float $longitude
 * @property float $latitude
 * @property Country $country
 * @property Municipality[] $municipalities
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class City extends Model implements HasMedia
{
    use LogsActivity;
    use HasMediaTrait;
    use Translatable;
    use Notifiable;

    protected static $logFillable = true;

    protected $fillable = ['name', 'description', 'population', 'latitude', 'longitude', 'country_id',];
    protected $translatedAttributes = ['name', 'description',];
    protected $translationModel = CityTranslation::class;

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function municipalities()
    {
        return $this->hasMany(Municipality::class, 'city_id');
    }

    public function population()
    {
        return $this->municipalities()->sum('population');
    }

    public function houses()
    {
        return $this->municipalities()->sum('houses');
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
