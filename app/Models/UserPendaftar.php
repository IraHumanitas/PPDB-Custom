<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserPendaftar extends Authenticatable
{
    use Notifiable;

    protected $table = 'user_pendaftar';

    protected $fillable = [
        'nisn',
        'nik',
        'name',
    ];

}
