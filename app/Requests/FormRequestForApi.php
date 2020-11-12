<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 9/3/2019
 * Time: 3:14 PM
 */

namespace App\Requests;


use App\Exceptions\ApiValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class FormRequestForApi extends FormRequest
{
    public function failedValidation(Validator $validator)
    {
        if ($this->wantsJson()) {
            throw new ApiValidationException('The given data was invalid.', $validator->errors(), 422);
        } else {
            throw (new ValidationException($validator))
                ->errorBag($this->errorBag)
                ->redirectTo($this->getRedirectUrl());
        }
    }
}