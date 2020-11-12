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
        $selectCountries = countryList();
        $doctors = $this->model;
        return view('backend::doctors.index')
            ->with(['doctors' => $doctors,
                'selectCountries' => $selectCountries,
                $this->model->sortByDesc('created_at')]);
        /*return response()->json($this->accountTypeCategories);*/
    }
}
