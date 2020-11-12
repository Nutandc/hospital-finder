<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:11 PM
 */

namespace Modules\Backend\Http\Responses\Doctors;


use Illuminate\Contracts\Support\Responsable;
use Modules\Backend\Repositories\ClassRepository;

class DeleteResponse implements Responsable
{
    protected $class, $id;
    /**
     * @var ClassRepository
     */
    private $classRepository;

    public function __construct(ClassRepository $class, $id)
    {
        $this->classRepository = $class;
        $this->id = $id;
    }

    public function toResponse($request)
    {
            $redirectRoute = redirect()->route( 'class.index');
            $class = $this->classRepository->delete($this->id);
            if ($class) {
                return $redirectRoute->with('success', 'Class deleted successfully');
            } else {
                return $redirectRoute->with('failed', 'Class failed to be deleted');
            }
    }
}
