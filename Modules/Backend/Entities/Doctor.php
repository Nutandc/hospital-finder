<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['name','special_for','designation',];

}
$table->string('name');
$table->string('special_for');
$table->string('designation');
$table->string('detail');
$table->string('image');
