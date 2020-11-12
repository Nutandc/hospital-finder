<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/9/2018
 * Time: 12:05 PM
 */

namespace Modules\Backend\Http\Responses\Subjects;


use Illuminate\Contracts\Support\Responsable;

class ShowResponse implements Responsable
{
    protected $subject;

    public function __construct($subject)
    {
        $this->subject = $subject;
    }

    public function toResponse($request)
    {
        return response()->json( $this->transformDepartment());
    }

    public function transformDepartment(){
        return [
            'id' => $this->subject->id,
            'name' =>$this->subject->name,
        ];
    }
}
