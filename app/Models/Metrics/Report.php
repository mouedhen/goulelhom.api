<?php

namespace App\Models\Metrics;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

/**
 * @property int $id
 * @property string $title
 * @property string description
 * @property \Carbon\Carbon $published_at
 * @property \Carbon\Carbon $period_start_at
 * @property \Carbon\Carbon $period_end_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Report extends Model implements HasMedia
{
    use LogsActivity;
    use HasMediaTrait;
    use Translatable;

    protected $table = 'reports';

    protected $fillable = ['title', 'description', 'published_at', 'period_start_at', 'period_end_at',];
    protected $translatedAttributes = ['title', 'description'];
    protected $dates = ['published_at', 'period_start_at', 'period_end_at', 'created_at', 'updated_at',];
    protected $translationModel = ReportTranslation::class;

    protected static $logFillable = true;

    public function document()
    {
        return $this->getFirstMediaUrl('documents');
    }

    public function thumb()
    {
        return $this->getFirstMediaUrl('documents', 'thumb');
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('documents')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'application/pdf';
            })
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->width(600)
                    ->height(800);
            });
    }
}
