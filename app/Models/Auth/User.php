<?php

namespace App\Models\Auth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\Activitylog\Traits\HasActivity;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use HasApiTokens;
    use HasActivity;
    use EntrustUserTrait;

    use HasMediaTrait;

    protected static $logFillable = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function avatar() {
        return $this->getMedia('avatar')->last();
    }

    public function thumb() {
        return $this->getMedia('thumb')->last();
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('avatar')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg' || $file->mimeType === 'image/png';
            })
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->width(400)
                    ->height(300);
            });
    }
}
