<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $fillable = ['name', 'detail', 'hospital_id'];

    function hospital()
    {
        return $this->belongsToMany(Hospital::class);
    }
}
