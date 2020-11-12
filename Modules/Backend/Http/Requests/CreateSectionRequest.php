<?php

namespace Modules\Backend\Http\Requests;
use App\Requests\FormRequestForApi;

use Illuminate\Foundation\Http\FormRequest;

class CreateSectionRequest extends FormRequestForApi
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|',
            'capacity' => 'required|max:255|',
            'class' => 'required|max:255|',
            'teacher' => 'required|max:255|',
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
