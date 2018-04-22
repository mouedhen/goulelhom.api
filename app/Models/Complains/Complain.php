<?php

namespace App\Models\Complains;

use App\Models\Contacts\Contact;
use App\Models\Locations\Municipality;
use App\Models\Metrics\Keyword;
use App\Models\Metrics\Theme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

/**
 * @property int $id
 * @property string $subject
 * @property string $description
 * @property float $longitude
 * @property float $latitude
 * @property boolean $is_new
 * @property boolean $is_moderated
 * @property boolean $is_valid
 * @property boolean $has_approved_sworn_statement
 * @property boolean $has_approved_term_of_use
 * @property int $theme_id
 * @property int $contact_id
 * @property int $municipality_id
 * @property Theme $theme
 * @property Contact $contact
 * @property Municipality $municipality
 * @property Keyword[] $keywords
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Complain extends Model implements HasMedia
{
    use LogsActivity;
    use HasMediaTrait;
    use Notifiable;

    protected static $logFillable = true;

    protected $fillable = [
        'subject',
        'description',
        'longitude',
        'latitude',
        'is_new',
        'is_moderated',
        'is_valid',
        'has_approved_sworn_statement',
        'has_approved_term_of_use',
        'theme_id',
        'contact_id',
        'municipality_id',
    ];

    public function theme()
    {
        return $this->belongsTo(Theme::class, 'theme_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }

    public function keywords()
    {
        return $this->belongsToMany(
            Keyword::class,
            'keywords_complains',
            'complain_id',
            'keyword_id'
        );
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
            ->addMediaCollection('videos')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumbs')
                    ->width(368)
                    ->height(232)
                    ->extractVideoFrameAtSecond(1);
            });
    }
}
