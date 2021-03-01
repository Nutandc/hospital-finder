<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:05 PM
 */

namespace Modules\Backend\Http\Responses\Doctors;


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
        $doctors = $this->model;
        return view('backend::doctors.index')
            ->with(['doctors' => $doctors,
                'selectCountries' => countryList(),
                $this->model->sortByDesc('created_at')]);
    }
}
