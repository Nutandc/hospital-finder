<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/9/2018
 * Time: 12:05 PM
 */

namespace Modules\Backend\Http\Responses\Parents;


use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    private $parent;

    public function __construct($parent)
    {
        $this->parent = $parent;
    }

    public function toResponse($request)
    {
        $parent = $this->parent;
        return view('backend::parents.edit', compact('parent'));
    }

}
