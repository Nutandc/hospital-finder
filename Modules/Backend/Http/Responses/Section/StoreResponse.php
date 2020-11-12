<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:10 PM
 */

namespace Modules\Backend\Http\Responses\Section;


use Illuminate\Contracts\Support\Responsable;

class StoreResponse implements Responsable
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function toResponse($request)
    {
        if ($this->model) {
            return redirect()->route('sections.index')->with('success', 'Section added successfully');
        } else {
            return redirect()->back()->withInput()->with('failed', 'Section cannot be added');
        }
    }
}
