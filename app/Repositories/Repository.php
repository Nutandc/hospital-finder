<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;

abstract class Repository implements RepositoryInterface
{
    // model property on class instances
    protected $model;

    public function __call($method, $arguments)
    {
        return $this->model->{$method}(...$arguments);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function create(array $attributes)
    {

        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $record = $this->getById($id);
        $record->update($attributes);
        return $record;
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->getById($id)->delete();
    }

    public function getByCodeNumber($column, $data)
    {
        return $this->model->where($column, $data)->first();
    }

    public function getNext($id)
    {
        return $this->model->where('id', '>', $id)->orderBy('id', 'ASC')->first();
    }

    public function getNextWithProjectId($id, $project_id)
    {
        return $this->model
            ->where('id', '>', $id)
            ->where('project_id', $project_id)
            ->orderBy('id', 'ASC')
            ->first();
    }

    public function getPrevious($id)
    {
        return $this->model->where('id', '<', $id)->orderBy('id', 'DESC')->first();
    }

    public function getPreviousWithProjectId($id, $project_id)
    {
        return $this->model
            ->where('project_id', $project_id)
            ->where('id', '<', $id)
            ->orderBy('id', 'DESC')
            ->first();
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getSelectAll()
    {
        return $this->model->all()
            ->sortBy('name')
            ->pluck('name', 'id');
    }

    public function getSelectAllByProject($project_id)
    {
        return $this->model->all()
            ->where('project_id', $project_id)
            ->sortBy('name')
            ->pluck('name', 'id');
    }

    public function getByIdWith($id, ...$relations)
    {
        return $this->model->with($relations)
            ->where('id', $id)
            ->first();
    }

    protected function find($id)
    {
        return $this->model->find($id);
    }

}
