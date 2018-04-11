<?php

namespace App\Models\Auth;

use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    use Notifiable;
}
