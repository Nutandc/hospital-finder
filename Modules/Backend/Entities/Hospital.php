<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = ['name', 'phone', 'detail', 'location', 'opening_hour', 'special_for', 'image', 'address'];
}
