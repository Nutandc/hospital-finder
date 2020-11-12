<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/22/2018
 * Time: 4:00 PM
 */

namespace Modules\Backend\Repositories;


use App\Repositories\Repository;
use Modules\Backend\Entities\Classr;
use Modules\Backend\Entities\Doctor;

class DoctorRepository extends Repository
{
    protected $model;

    public function __construct(Doctor $model)
    {
        $this->model = $model;
    }

}
