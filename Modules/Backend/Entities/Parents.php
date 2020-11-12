<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Parents extends Model
{
    use Notifiable;

    protected $fillable = [
        'guardian_name',
        'email', 'phone', 'address', 'photo',
        'user_name', 'password'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
