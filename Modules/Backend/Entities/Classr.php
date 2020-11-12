<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class Classr extends Model
{
    protected $fillable = ['name'];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function classes()
    {
        return $this->hasMany(Section::class);
    }
}
