<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:11 PM
 */

namespace Modules\Backend\Http\Responses\Disease;


use Illuminate\Contracts\Support\Responsable;
use Modules\Backend\Repositories\ClassRepository;
use Modules\Backend\Repositories\DoctorRepository;

class DeleteResponse implements Responsable
{
    protected $doctor, $id;
    /**
     * @var ClassRepository
     */
    private $model;
    /**
     * @var DoctorRepository
     */
    private $repo;

    public function __construct(DoctorRepository $class, $id)
    {
        $this->repo = $class;
        $this->id = $id;
    }

    public function toResponse($request)
    {
        $redirectRoute = redirect()->route('doctors.index');
        $doctor = $this->repo->delete($this->id);
        if ($doctor) {
            return $redirectRoute->with('success', 'Doctors deleted successfully');
        } else {
            return $redirectRoute->with('failed', 'Doctors failed to be deleted');
        }
    }
}
