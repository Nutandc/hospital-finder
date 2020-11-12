<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:11 PM
 */

namespace Modules\Backend\Http\Responses\Hospitals;


use Illuminate\Contracts\Support\Responsable;
use Modules\Backend\Repositories\ClassRepository;
use Modules\Backend\Repositories\DoctorRepository;
use Modules\Backend\Repositories\HospitalRepository;

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

    public function __construct(HospitalRepository $repo, $id)
    {
        $this->repo = $repo;
        $this->id = $id;
    }

    public function toResponse($request)
    {
        $redirectRoute = redirect()->route('hospitals.index');
        $doctor = $this->repo->delete($this->id);
        if ($doctor) {
            return $redirectRoute->with('success', 'Hospital deleted successfully');
        } else {
            return $redirectRoute->with('failed', 'Hospital failed to be deleted');
        }
    }
}
