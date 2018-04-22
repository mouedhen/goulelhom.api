<?php

namespace App\Models\Petitions;

use App\Models\Contacts\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property Contact $contact
 * @property Petition $petition
 */
class Signature extends Model
{
    use Notifiable;
    use LogsActivity;

    protected static $logFillable = true;
    protected $fillable = ['contact_id', 'petition_id'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function petition()
    {
        return $this->belongsTo(Petition::class);
    }
}
