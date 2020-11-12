<?php

namespace Modules\Backend\Http\Requests;

use App\Requests\FormRequestForApi;
use Illuminate\Foundation\Http\FormRequest;

class CreateParentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'guardian_name' => 'required|max:255',
            'email' => 'required|max:255',
            'user_name' => 'required|max:255',
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
