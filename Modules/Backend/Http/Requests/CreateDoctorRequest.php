<?php

namespace Modules\Backend\Http\Requests;

use App\Requests\FormRequestForApi;

class CreateDoctorRequest extends FormRequestForApi
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:doctors,name',
            'speciality' => 'required|max:255',
            'designation' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'nullable',
            'address' => 'nullable',
            'detail' => 'nullable',

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
