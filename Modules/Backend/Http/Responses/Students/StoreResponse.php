<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:10 PM
 */

namespace Modules\Backend\Http\Responses\Students;


use Illuminate\Contracts\Support\Responsable;
use Modules\Auth\Notifications\UserInvited;
use Modules\Backend\Entities\Student;

class StoreResponse implements Responsable
{
    private $model;
    private $password_generated;

    public function __construct(Student $model, $password_generated)
    {
        $this->model = $model;
        $this->password_generated = $password_generated;
    }

    public function toResponse($request)
    {
        $this->model->notify(new UserInvited($this->model, $this->password_generated));
        if ($this->model) {
            return redirect()->route('students.index')->with('success', 'Student added successfully');
        } else {
            return redirect()->back()->withInput()->with('failed', 'Student cannot be added');
        }
    }
}
