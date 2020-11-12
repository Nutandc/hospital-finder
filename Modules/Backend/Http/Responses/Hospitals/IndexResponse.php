<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:05 PM
 */

namespace Modules\Backend\Http\Responses\Hospitals;


use Illuminate\Contracts\Support\Responsable;

class IndexResponse implements Responsable
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function toResponse($request)
    {
        return view('backend::hospitals.index')
            ->with('hospitals',
                $this->model->sortByDesc('created_at'));
        /*return response()->json($this->accountTypeCategories);*/
    }
}
