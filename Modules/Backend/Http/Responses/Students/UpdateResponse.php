<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:11 PM
 */

namespace Modules\Backend\Http\Responses\Students;


use Illuminate\Contracts\Support\Responsable;
use Modules\Auth\Notifications\UserUpdated;
use Modules\Backend\Entities\Student;

class UpdateResponse implements Responsable
{
    private $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function toResponse($request)
    {
        if ($this->student) {
            $this->student->notify(new UserUpdated($this->student));
            return redirect()->route('students.index')->with('success', 'Student updated successfully');
        } else {
            return redirect()->back()->withInput()->with('failed', 'Student cannot be updated');
        }
    }
}
