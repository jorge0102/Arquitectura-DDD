<?php

namespace Src\BoundedContext\User\Application\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginAuthRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['string', 'required'],
            'password' => ['string', 'required', 'min:1']
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation error',
            'data' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'password.required' => 'Password is required'
        ];
    }
}
