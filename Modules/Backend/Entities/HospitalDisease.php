<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class HospitalDisease extends Model
{
    protected $fillable = [
        'hospital_id', 'disease_id'
    ];
}
