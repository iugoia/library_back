<?php

namespace App\Http\Requests\Feedback;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FeedbackStoreRequest extends FormRequest
{
//    public function authorize()
//    {
//        return false;
//    }

    public function rules()
    {

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ], 422));
    }
}
