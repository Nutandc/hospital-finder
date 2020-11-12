<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/9/2018
 * Time: 12:05 PM
 */

namespace Modules\Backend\Http\Responses\Hospitals;


use Illuminate\Contracts\Support\Responsable;

class ShowResponse implements Responsable
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function toResponse($request)
    {
        return response()->json($this->transformDepartment());
    }

    public function transformDepartment()
    {
        return [
            'id' => $this->model->id,
            'name' => $this->model->name,
            'special_for' => $this->model->special_for,
            'opening_hour' => $this->model->opening_hour,
            'location' => $this->model->location,
            'email' => $this->model->email,
            'phone' => $this->model->phone,
            'address' => $this->model->address,
            'detail' => $this->model->detail,
        ];
    }
}
