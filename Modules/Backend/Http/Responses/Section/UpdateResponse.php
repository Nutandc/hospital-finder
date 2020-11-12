<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:11 PM
 */

namespace Modules\Backend\Http\Responses\Section;


use Illuminate\Contracts\Support\Responsable;

class UpdateResponse implements Responsable
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function toResponse($request)
    {
        if ($this->model) {
            $request->session()->flash('success', 'Teacher updated successfully.');
            return redirect()->route('sections.index');
        } else {
            $request->session()->flash('failed', 'Teacher cannot be updated.');
            return redirect()->route('sections.index');
        }
    }
}
