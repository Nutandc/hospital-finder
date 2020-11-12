<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name', 'capacity', 'class', 'teacher', 'note'];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classr::class);
    }

}



