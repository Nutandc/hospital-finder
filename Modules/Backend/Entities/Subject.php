<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'class_id', 'subject_id', 'type',
        'final_mark', 'pass_mark',
        'subject_name', 'subject_author', 'subject_code'
    ];
}

