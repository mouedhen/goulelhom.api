<?php

namespace App\Models\Contacts;

use App\Models\Petitions\Petition;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class Organization
 * @package App\Models\Contacts
 * @property int $id
 */
class Organization extends Model
{
    use LogsActivity;
    use Translatable;
    use Notifiable;

    protected static $logFillable = true;

    protected $fillable = ['name', 'description', 'phone_number', 'address', 'mail'];
    protected $translatedAttributes = ['name', 'description'];

    public function petitions()
    {
        return $this->hasMany(Petition::class);
    }
}
