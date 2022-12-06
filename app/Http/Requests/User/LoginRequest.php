<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

//    protected function failedValidation(Validator $validator)
//    {
//        throw new HttpResponseException(response()->json([
//            'status' => false,
//            'errors' => $validator->errors()
//        ], 422));
//    }
}
