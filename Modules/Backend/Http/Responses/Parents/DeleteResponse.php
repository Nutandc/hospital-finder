<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:11 PM
 */

namespace Modules\Backend\Http\Responses\Parents;


use Illuminate\Contracts\Support\Responsable;
use Modules\Backend\Repositories\ClassRepository;
use Modules\Backend\Repositories\ParentRepository;

class DeleteResponse implements Responsable
{
    protected $class, $id;
    /**
     * @var ClassRepository
     */
    private $classRepository;
    /**
     * @var ParentRepository
     */
    private $model;

    public function __construct(ParentRepository $model, $id)
    {
        $this->id = $id;
        $this->model = $model;
    }

    public function toResponse($request)
    {
            $redirectRoute = redirect()->route( 'parents.index');
            $parent = $this->model->delete($this->id);
            if ($parent) {
                return $redirectRoute->with('success', 'Parents deleted successfully');
            } else {
                return $redirectRoute->with('failed', 'Parents failed to be deleted');
            }
    }
}
