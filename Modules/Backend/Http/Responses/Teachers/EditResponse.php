<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/9/2018
 * Time: 12:05 PM
 */

namespace Modules\Backend\Http\Responses\Teachers;


use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    private $teacher;

    public function __construct($teacher)
    {
        $this->teacher = $teacher;
    }

    public function toResponse($request)
    {
        $teacher = $this->teacher;
        return view('backend::teachers.edit', compact('teacher'));
    }

}
