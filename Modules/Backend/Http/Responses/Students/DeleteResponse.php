<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:11 PM
 */

namespace Modules\Backend\Http\Responses\Students;


use Illuminate\Contracts\Support\Responsable;
use Modules\Backend\Repositories\ClassRepository;
use Modules\Backend\Repositories\StudentRepository;

class DeleteResponse implements Responsable
{
    protected $student, $id;
    /**
     * @var ClassRepository
     */
    private $StudentRepository;

    public function __construct(StudentRepository $student, $id)
    {
        $this->StudentRepository = $student;
        $this->id = $id;
    }

    public function toResponse($request)
    {
            $redirectRoute = redirect()->route( 'students.index');
            $student = $this->StudentRepository->delete($this->id);
            if ($student) {
                return $redirectRoute->with('success', 'Student deleted successfully');
            } else {
                return $redirectRoute->with('failed', 'Student failed to be deleted');
            }
    }
}
