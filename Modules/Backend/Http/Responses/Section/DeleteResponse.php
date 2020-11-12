<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:11 PM
 */

namespace Modules\Backend\Http\Responses\Section;


use Illuminate\Contracts\Support\Responsable;
use Modules\Backend\Repositories\ClassRepository;

class DeleteResponse implements Responsable
{
    protected $class, $id;
    /**
     * @var ClassRepository
     */
    private $classRepository;
    private $model;

    public function __construct($model, $id)
    {
        $this->model = $model;
        $this->id = $id;
    }

    public function toResponse($request)
    {
            $redirectRoute = redirect()->route( 'sections.index');
            $section = $this->model->delete($this->id);
            if ($section) {
                return $redirectRoute->with('success', 'Section deleted successfully');
            } else {
                return $redirectRoute->with('failed', 'Section failed to be deleted');
            }
    }
}
