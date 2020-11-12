<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

class CrudRepository extends Repository
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}