<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['name','special_for','designation','detail','image'];

}

