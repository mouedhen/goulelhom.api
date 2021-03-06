<?php

namespace App\Models\Contacts;

use App\Models\Complains\Complain;
use App\Traits\Security\Encryptable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * @property int $id
 * @property string $name
 * @property string $phone_number
 * @property string $email
 * @property string $address
 * @property Complain $complains
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Contact extends Model
{
    use Notifiable;
    use LogsActivity;
    use Encryptable;

    protected $table = 'contacts';
    protected $fillable = ['name', 'phone_number', 'email', 'address'];
    protected static $logFillable = true;
    protected $encryptable = ['name', 'phone_number', 'email', 'address'];

    public function complains()
    {
        return $this->hasMany(Complain::class);
    }
}
