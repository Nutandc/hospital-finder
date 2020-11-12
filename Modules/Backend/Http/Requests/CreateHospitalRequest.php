<?php

namespace Modules\Backend\Http\Requests;

use App\Requests\FormRequestForApi;

class CreateHospitalRequest extends FormRequestForApi
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
            'location' => 'required|max:255',
            'opening_hour' => 'required|max:255',
            'special_for' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'nullable',
            'detail' => 'nullable',
            'image' => 'nullable',
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
