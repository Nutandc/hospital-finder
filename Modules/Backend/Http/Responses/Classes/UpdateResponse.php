<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:11 PM
 */

namespace Modules\Backend\Http\Responses\Classes;


use Illuminate\Contracts\Support\Responsable;

class UpdateResponse implements Responsable
{
    protected $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function toResponse($request)
    {
        if ($this->class) {
            $request->session()->flash('success', 'Class updated successfully.');
            return redirect()->route('class.index');
        } else {
            $request->session()->flash('failed', 'class cannot be updated.');
            return redirect()->route('class.index');
        }
    }
}
