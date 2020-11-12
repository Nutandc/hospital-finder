<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use Notifiable;

    protected $fillable = [
        'guardian', 'date_of_birth', 'gender', 'blood_group', 'email', 'name',
        'phone', 'address', 'country', 'class', 'section', 'register_no', 'roll_no','photo',
        'remarks'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}

