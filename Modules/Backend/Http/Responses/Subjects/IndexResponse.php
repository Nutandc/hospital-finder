<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:05 PM
 */

namespace Modules\Backend\Http\Responses\Subjects;


use Illuminate\Contracts\Support\Responsable;
use Modules\Backend\Entities\Classr;
use Modules\Backend\Entities\Subject;
use Modules\Backend\Entities\Teacher;
use Modules\Backend\Repositories\ClassRepository;
use Modules\Backend\Repositories\TeacherRepository;

class IndexResponse implements Responsable
{
    protected $subjects;

    public function __construct($subjects)
    {
        $this->subjects = $subjects;
    }


    public function toResponse($request)
    {
        $selectType = [
            'optional' => 'Optional',
            'mandatory' => 'Mandatory'
        ];
        $selectClass = (new ClassRepository(new Classr()))->getAll()->pluck('name', 'id')->toArray();
        $selectTeacher = (new TeacherRepository(new Teacher()))->getAll()->pluck('name', 'id')->toArray();
        return view('backend::subjects.index',
            with([
                'selectTeacher' => $selectTeacher,
                'selectClass' => $selectClass,
                'selectType' => $selectType,
                'subject' => new Subject(),
                'subjects' => $this->subjects
            ]));

        /*return response()->json($this->accountTypeCategories);*/
    }
}
