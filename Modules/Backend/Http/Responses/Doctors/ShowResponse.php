<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/9/2018
 * Time: 12:05 PM
 */

namespace Modules\Backend\Http\Responses\Doctors;


use Illuminate\Contracts\Support\Responsable;

class ShowResponse implements Responsable
{
    protected $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function toResponse($request)
    {
        return response()->json( $this->transformDepartment());
    }

    public function transformDepartment(){
        return [
            'id' => $this->class->id,
            'name' =>$this->class->name,
        ];
    }
}
