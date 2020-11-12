<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:11 PM
 */

namespace Modules\Backend\Http\Responses\Subjects;


use Illuminate\Contracts\Support\Responsable;

class UpdateResponse implements Responsable
{
    protected $subject;

    public function __construct($subject)
    {
        $this->subject = $subject;
    }

    public function toResponse($request)
    {
        if ($this->subject) {
            $request->session()->flash('success', 'Subject updated successfully.');
            return redirect()->route('class.index');
        } else {
            $request->session()->flash('failed', 'Subject cannot be updated.');
            return redirect()->route('class.index');
        }
    }
}
