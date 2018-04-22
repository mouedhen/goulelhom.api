<?php

namespace App\Models\Petitions;

use App\Models\Contacts\Contact;
use App\Models\Contacts\Organization;
use App\Models\Metrics\Theme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

/**
 * @property int $id
 * @property string $uuid
 * @property \Carbon\Carbon $start_date
 * @property \Carbon\Carbon $end_date
 * @property string $name
 * @property string $description
 * @property int $theme_id
 * @property int $contact_id
 * @property int $organization_id
 * @property int $requested_signatures_number
 * @property string $status
 * @property bool $is_boosted
 * @property bool $is_new
 * @property bool $is_moderated
 * @property bool $is_valid
 * @property bool $has_approved_sworn_statement
 * @property bool $has_approved_term_of_use
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property Theme $theme
 * @property Contact $contact
 * @property Organization $organization
 * @property Signature[] $signatures
 * @property Comment[] $comments
 */
class Petition extends Model implements HasMedia
{
    use LogsActivity;
    use HasMediaTrait;
    use Notifiable;

    protected static $logFillable = true;

    protected $fillable = [
        'uuid',
        'start_date',
        'end_date',
        'name',
        'description',
        'theme_id',
        'contact_id',
        'organization_id',
        'requested_signatures_number',
        'status',
        'is_boosted',
        'is_new',
        'is_moderated',
        'is_valid',
        'has_approved_sworn_statement',
        'has_approved_term_of_use',
    ];

    protected $dates = ['created_at', 'updated_at', 'start_date', 'end_date'];

    public function theme()
    {
        return $this->belongsTo(Theme::class, 'theme_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function signatures()
    {
        return $this->hasMany(Signature::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
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
