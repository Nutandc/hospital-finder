<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:11 PM
 */

namespace Modules\Backend\Http\Responses\Parents;


use Illuminate\Contracts\Support\Responsable;

class UpdateResponse implements Responsable
{
    private $teacher;
    private $parent;

    public function __construct($parent)
    {
        $this->parent = $parent;
    }

    public function toResponse($request)
    {
        if ($this->parent) {
            return redirect()->route('parents.index')->with('success', 'Parents updated successfully');
        } else {
            return redirect()->back()->withInput()->with('failed', 'Parents cannot be updated');
        }
    }
}
