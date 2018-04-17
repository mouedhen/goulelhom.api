<?php

namespace App\Models\Metrics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * @property int $id
 * @property string $label
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Keyword extends Model
{
    use Notifiable;
    use LogsActivity;

    protected $table = 'keywords';
    protected $fillable = ['label'];
}
