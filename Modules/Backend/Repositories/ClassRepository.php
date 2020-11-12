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

class ClassRepository extends Repository
{
    protected $model;

    public function __construct(Classr $model)
    {
        $this->model = $model;
    }

    public function selectDepartments()
    {
        return $this->getSelectAll();
    }
}
