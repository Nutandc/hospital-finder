<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:10 PM
 */

namespace Modules\Backend\Http\Responses\Teachers;


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
            return redirect()->route('teachers.index')->with('success', 'Teacher added successfully');
        } else {
            return redirect()->back()->withInput()->with('failed', 'Teacher cannot be added');
        }
    }
}
