<?php

namespace Modules\Backend\Http\Requests;

use App\Requests\FormRequestForApi;
use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'class' => 'required',
            'section' => 'required',
            'register_no' => 'required|max:255',
            'roll_no' => 'required|max:255',
            'user_name' => 'required|max:255',
            'date_of_birth'=>'date|date_format:Y-m-d'
//            'password' => 'required|max:255',
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
