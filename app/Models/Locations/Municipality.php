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
 * @property integer $houses
 * @property integer $regional_council_number
 * @property integer $municipal_council_number
 * @property string $website
 * @property string $phone
 * @property string $email
 * @property string $fax
 * @property integer $longitude
 * @property integer $latitude
 * @property boolean $is_active
 * @property City $city
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Municipality extends Model implements HasMedia
{
    use LogsActivity;
    use HasMediaTrait;
    use Translatable;
    use Notifiable;

    protected static $logFillable = true;

    protected $fillable = [
        'name',
        'description',
        'population',
        'houses',
        'regional_council_number',
        'municipal_council_number',
        'website',
        'phone',
        'email',
        'fax',
        'longitude',
        'latitude',
        'is_active',
        'city_id',
    ];
    protected $translatedAttributes = ['name', 'description',];
    protected $translationModel = MunicipalityTranslation::class;

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    // public function claims()
    // {
    //     return $this->hasMany(Claim::class);
    // }

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
