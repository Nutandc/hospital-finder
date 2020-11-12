<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/9/2018
 * Time: 12:05 PM
 */

namespace Modules\Backend\Http\Responses\Section;


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
            'name' => $this->model->name,
            'capacity' => $this->model->capacity,
            'class' => $this->model->class,
            'teacher' => $this->model->teacher,
            'note' => $this->model->note,
        ];
    }
}
