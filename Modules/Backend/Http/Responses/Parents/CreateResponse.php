<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:05 PM
 */

namespace Modules\Backend\Http\Responses\Parents;


use Illuminate\Contracts\Support\Responsable;
use Modules\Backend\Entities\Parents;
use Modules\Backend\Entities\Teacher;

class CreateResponse implements Responsable
{


    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function toResponse($request)
    {
        return view('backend::parents.create',with(['parent'=>new Parents()]));
        /*return response()->json($this->accountTypeCategories);*/
    }
}
