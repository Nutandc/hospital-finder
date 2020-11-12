<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/22/2018
 * Time: 4:00 PM
 */

namespace Modules\Backend\Repositories;


use App\Repositories\Repository;
use Modules\Backend\Entities\Hospital;

class HospitalRepository extends Repository
{
    protected $model;

    public function __construct(Hospital $model)
    {
        $this->model = $model;
    }

}
