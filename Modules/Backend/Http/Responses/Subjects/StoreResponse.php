<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:10 PM
 */

namespace Modules\Backend\Http\Responses\Subjects;


use Illuminate\Contracts\Support\Responsable;

class StoreResponse implements Responsable
{
    protected $class;
    private $department;

    public function __construct($subject)
    {
        $this->subject = $subject;
    }

    public function toResponse($request)
    {
        if ($this->subject) {
            return redirect()->route('subject.index')->with('success', 'Subjects added successfully');
        } else {
            return redirect()->back()->withInput()->with('failed', 'Subjects cannot be added');
        }
    }
}
