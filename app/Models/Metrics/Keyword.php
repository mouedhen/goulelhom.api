<?php

namespace App\Models\Metrics;

use App\Models\Complains\Complain;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * @property int $id
 * @property string $label
 * @property Complain[] $complains
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Keyword extends Model
{
    use Notifiable;
    use LogsActivity;

    protected $table = 'keywords';
    protected $fillable = ['label'];

    public function complains()
    {
        return $this->belongsToMany(
            Complain::class,
            'keywords_complains',
            'keyword_id',
            'claim_id'
        );
    }
}
