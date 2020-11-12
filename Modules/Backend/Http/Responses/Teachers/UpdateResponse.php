<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:11 PM
 */

namespace Modules\Backend\Http\Responses\Teachers;


use Illuminate\Contracts\Support\Responsable;

class UpdateResponse implements Responsable
{
    private $teacher;

    public function __construct($teacher)
    {
        $this->teacher = $teacher;
    }

    public function toResponse($request)
    {
        if ($this->teacher) {
            return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully');
        } else {
            return redirect()->back()->withInput()->with('failed', 'Teacher cannot be updated');
        }
    }
}
