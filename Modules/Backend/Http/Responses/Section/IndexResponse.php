<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:05 PM
 */

namespace Modules\Backend\Http\Responses\Section;


use Illuminate\Contracts\Support\Responsable;
use Modules\Backend\Entities\Classr;
use Modules\Backend\Entities\Teacher;
use Modules\Backend\Repositories\ClassRepository;
use Modules\Backend\Repositories\TeacherRepository;

class IndexResponse implements Responsable
{
    protected $class;

    public function __construct($model)
    {
        $this->class = $model;
    }

    public function toResponse($request)
    {
        $selectClass = (new ClassRepository(new Classr()))->getAll()->pluck('name', 'id')->toArray();
        $selectTeacher = (new TeacherRepository(new Teacher()))->getAll()->pluck('name', 'id')->toArray();
        $sections = $this->class->sortByDesc('created_at');
        return view('backend::sections.index',
            ['sections' => $sections,
                'selectClass' => $selectClass,
                'selectTeacher' => $selectTeacher,
            ]);
    }
}
