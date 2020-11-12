<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name', 'designation',
        'date_of_birth', 'gender',
        'religion', 'email', 'phone',
        'address', 'joining_date',
        'photo', 'username', 'password'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
