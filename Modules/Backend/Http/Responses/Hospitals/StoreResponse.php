<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:10 PM
 */

namespace Modules\Backend\Http\Responses\Hospitals;


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
            return redirect()->route('hospitals.index')->with('success', 'Hospital added successfully');
        } else {
            return redirect()->back()->withInput()->with('failed', 'Hospital cannot be added');
        }
    }
}
