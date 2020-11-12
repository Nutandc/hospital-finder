<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/9/2018
 * Time: 12:05 PM
 */

namespace Modules\Backend\Http\Responses\Students;


use Illuminate\Contracts\Support\Responsable;

class ShowResponse implements Responsable
{
    protected $student;

    public function __construct($student)
    {
        $this->student = $student;
    }

    public function toResponse($request)
    {
        $student = $this->student;
        return view('backend::students.show', compact('student'));
    }


}
