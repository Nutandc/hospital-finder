<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:05 PM
 */

namespace Modules\Backend\Http\Responses\Students;


use Illuminate\Contracts\Support\Responsable;

class IndexResponse implements Responsable
{
    protected $student;

    public function __construct($student)
    {
        $this->student = $student;
    }

    public function toResponse($request)
    {
        return view('backend::students.index')
            ->with('students', $this->student->sortByDesc('created_at'));
        /*return response()->json($this->accountTypeCategories);*/
    }
}
