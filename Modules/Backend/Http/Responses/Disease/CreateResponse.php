<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:05 PM
 */

namespace Modules\Backend\Http\Responses\Disease;


use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{



    public function toResponse($request)
    {
        return view('backend::teachers.create');
        /*return response()->json($this->accountTypeCategories);*/
    }
}
