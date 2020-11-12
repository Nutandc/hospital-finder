<?php

namespace Modules\Backend\Http\Requests;

use App\Requests\FormRequestForApi;
use Illuminate\Foundation\Http\FormRequest;

class CreateTeacherRequest extends FormRequest
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
            'designation' => 'required|max:255',
            'date_of_birth' => 'required|date',
            'email' => 'required|max:255',
            'joining_date' => 'required|date',
            'username' => 'required|max:255',
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
