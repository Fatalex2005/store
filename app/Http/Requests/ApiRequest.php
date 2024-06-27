<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiRequest extends FormRequest
{
    public function failedValidation(Validator $validator)
    {
        throw new ApiException(422, '', $validator->errors());
    }
    public function failedAuthorization()
    {
        return throw new ApiException(403, 'Login failed');
    }
}
