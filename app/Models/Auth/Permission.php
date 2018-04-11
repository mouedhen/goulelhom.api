<?php

namespace App\Models\Auth;

use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    use Notifiable;
}
